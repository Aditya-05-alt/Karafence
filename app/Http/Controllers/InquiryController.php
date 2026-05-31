<?php

namespace App\Http\Controllers;

use App\Mail\InquiryAdminNotification;
use App\Mail\InquiryUserConfirmation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class InquiryController extends Controller
{
    public function storeContact(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'program' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        return $this->sendInquiryEmails($data, 'contact', 'Contact Form', $request);
    }

    public function storeTrial(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
        ]);

        return $this->sendInquiryEmails($data, 'trial', 'Free Trial Booking', $request);
    }

    protected function sendInquiryEmails(array $data, string $source, string $sourceLabel, Request $request): RedirectResponse
    {
        $inquiry = array_merge($data, [
            'source' => $source,
            'source_label' => $sourceLabel,
            'submitted_at' => now()->format('F j, Y \a\t g:i A'),
        ]);

        $adminEmail = config('karafence.admin_email');

        if (!$adminEmail) {
            throw ValidationException::withMessages([
                'email' => 'We could not send your message right now. Please try again later.',
            ]);
        }

        try {
            Mail::to($adminEmail)->send(new InquiryAdminNotification($inquiry));
            Mail::to($data['email'])->send(new InquiryUserConfirmation($inquiry));
        } catch (\Throwable $e) {
            Log::error('Inquiry email failed', [
                'source' => $source,
                'email' => $data['email'],
                'error' => $e->getMessage(),
            ]);

            return back()
                ->withInput()
                ->with('error', 'We could not send your message right now. Please try again or contact us directly.');
        }

        $redirect = $source === 'contact'
            ? redirect()->route('contact')
            : redirect()->route('home')->withFragment('join');

        return $redirect->with('success', 'Thank you! We received your message and will contact you shortly.');
    }
}
