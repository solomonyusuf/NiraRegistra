<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController
{
    public static function UploadFile(Request $request, string $type)
    {
        if($type == 'image')
        {
            $client = $request?->image->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/'.rand(00001, 10000) . time() . '.' . request()->image->getClientOriginalName());
                request()->image->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }
        if($type == 'logo')
        {
            $client = $request?->logo?->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/'.rand(00001, 10000) . time() . '.' . request()->logo->getClientOriginalName());
                request()->logo->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }
        if($type == 'accreditation')
        {
            $client = $request?->accreditation?->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/'.rand(00001, 10000) . time() . '.' . request()->accreditation->getClientOriginalName());
                request()->accreditation->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }
        if($type == 'provisional_accreditation')
        {
            $client = $request?->provisional_accreditation?->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/'.rand(00001, 10000) . time() . '.' . request()->provisional_accreditation->getClientOriginalName());
                request()->provisional_accreditation->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }
        if($type == 'application_form')
        {
            $client = $request?->application_form?->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/'.rand(00001, 10000) . time() . '.' . request()->application_form->getClientOriginalName());
                request()->application_form->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }
        if($type == 'registra_agreement')
        {
            $client = $request?->registra_agreement?->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/'.rand(00001, 10000) . time() . '.' . request()->registra_agreement->getClientOriginalName());
                request()->registra_agreement->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }
        if($type == 'membership_form')
        {
            $client = $request?->membership_form?->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/' .rand(00001, 10000). time() . '.' . request()->membership_form->getClientOriginalName());
                request()->membership_form->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }
        if($type == 'bank_reference')
        {
            $client = $request?->bank_reference?->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/'.rand(00001, 10000) . time() . '.' . request()->bank_reference->getClientOriginalName());
                request()->bank_reference->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }
        if($type == 'company_profile')
        {
            $client = $request?->company_profile?->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/'.rand(00001, 10000) . time() . '.' . request()->company_profile->getClientOriginalName());
                request()->company_profile->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }
        if($type == 'payment_evidence')
        {
            $client = $request?->payment_evidence?->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/'.rand(00001, 10000) . time() . '.' . request()->payment_evidence->getClientOriginalName());
                request()->payment_evidence->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }
        if($type == 'cac_certificate')
        {
            $client = $request?->cac_certificate?->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/'.rand(00001, 10000) . time() . '.' . request()->cac_certificate->getClientOriginalName());
                request()->cac_certificate->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }
        if($type == 'tax_certificate')
        {
            $client = $request?->tax_certificate?->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/' . time().rand(00001, 10000) . '.' . request()->tax_certificate->getClientOriginalName());
                request()->tax_certificate->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }
        if($type == 'file')
        {
            $client = $request?->file?->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/'.rand(00001, 10000).time() . '.' . request()->file->getClientOriginalName());
                request()->file->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }


    }
}
