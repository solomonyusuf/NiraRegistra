<?php

namespace App\Http\Controllers;

use App\Imports\MailImport;
use App\Models\BulkEmail;
use App\Models\Calender;
use App\Models\Day;
use App\Models\Document;
use App\Models\EducationalResource;
use App\Models\ForumResource;
use App\Models\Month;
use App\Models\Payment;
use App\Models\Registra;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Toaster;

class AdminController
{

    public static function CreateProfile(Request $request)
    {
        try
        {
            $query = Registra::where([
                'company_name'=> $request->company_name,
                'email'=> $request->email
            ])->first();

            if($query)
            {
                toast('Registra Details Already Exist', 'error');
                return redirect()->back();
            }
            $profile = Registra::create(array(
                'logo' => UploadController::UploadFile($request, 'logo'),
                'email'=> $request->email,
                'previous_names'=> $request->previous_names,
                'company_name'=> $request->company_name,
                'phone_no'=> $request->phone_no,
                'country'=> $request->country,
                'state'=> $request->state,
                'address'=> $request->address,
                'accredited'=> $request?->accredited,
                'debt'=> $request?->debt,
            ));


            $list = array(
                'logo',
                'accreditation',
                'provisional_accreditation',
                'application_form',
                'registra_agreement',
                'membership_form',
                'bank_reference',
                'company_profile',
                'payment_evidence',
                'cac_certificate',
                'tax_certificate'
            );
            for($i= 0; $i < count($list); ++$i) {
                if($list[$i] != 'logo')
                {
                    $path = UploadController::UploadFile($request, $list[$i]);
                    Document::create(array(
                        'registras_id'=> $profile->id,
                        'name' => $list[$i],
                        'path'=> $path,
                    ));
                }
            }
            toast('Creation Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();
    }
    public static function UpdateProfile(Request $request)
    {
        /*try
        {*/
            $profile = Registra::find($request->id);

            if(!$profile)
            {
                toast('Registra Parameter Do Not Exist', 'error');
                return redirect()->back();
            }
            $profile->update(array(
                'logo' => $request?->logo ? UploadController::UploadFile($request, 'logo') : $profile->logo,
                'email'=> $request->email,
                'previous_names'=> $request->previous_names,
                'company_name'=> $request->company_name,
                'phone_no'=> $request->phone_no,
                'country'=> $request->country,
                'state'=> $request->state,
                'address'=> $request->address,
                'accredited'=> $request?->accredited,
            ));
            $profile->save();

            $list = array(
                'logo',
                'accreditation',
                'provisional_accreditation',
                'application_form',
                'registra_agreement',
                'membership_form',
                'bank_reference',
                'company_profile',
                'payment_evidence',
                'cac_certificate',
                'tax_certificate'
            );

            for($i= 0; $i < count($list); ++$i) {
                if($list[$i] != 'logo')
                {
                    $query = Document::where(['registras_id'=> $profile->id, 'name'=> $list[$i] ])->first();
                    if($query)
                    {
                        $path = UploadController::UploadFile($request, $list[$i]);
                        if($path)
                        {
                            $query->update(array(
                                'path'=> $path,
                            ));
                            $query->save();
                        }
                    }
                }
            }
            toast('Update Successful', 'success');
        /*}
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }*/

        return redirect()->back();
    }
    public static function CreateEducational(Request $request)
    {
        try
        {
            $query = EducationalResource::where([
                'name'=> $request->name
            ])->first();

            if($query)
            {
                toast('Details Already Exist', 'error');
                return redirect()->back();
            }
            EducationalResource::create(array(
                'name'=> $request->name,
                'path'=> UploadController::UploadFile($request, 'file'),
            ));
            toast('Creation Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();
    }
    public static function DeleteEducational($id)
    {
        EducationalResource::find($id)->delete();
        toast('Deletion Successful','success');
        return redirect()->back();
    }
    public static function CreateForum(Request $request)
    {
        try
        {
            $query = ForumResource::where([
                'name'=> $request->name
            ])->first();

            if($query)
            {
                toast('Details Already Exist', 'error');
                return redirect()->back();
            }
            ForumResource::create(array(
                'name'=> $request->name,
                'path'=> UploadController::UploadFile($request, 'file'),
            ));
            toast('Creation Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();
    }
    public static function DeleteForum($id)
    {
        ForumResource::find($id)->delete();
        toast('Deletion Successful','success');
        return redirect()->back();

    }
    public static function CreateEmail(Request $request)
    {
        try
        {
            $request->validate([
                'file' => 'required|mimes:xls,xlsx',
            ]);

            Excel::import(new MailImport, $request->file('file'));

            toast('Creation Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();
    }
    public static function DeleteEmail($id)
    {
        BulkEmail::find($id)->delete();
        toast('Deletion Successful','success');
        return redirect()->back();

    }
    public static function CreateEvent(Request $request)
    {
        try
        {
            $day = Day::where([
                'day'=> Carbon::parse($request->start)->day,
                'month_id'=> $request->month_id
            ])->first();

            $target = Carbon::parse($request->start);
             
            $month_name = $target->format('F');
            $day_int = $target->day;

            $month = Month::where('name', 'like', "%{$month_name}%")->first();
            $day = Day::where(['day'=> $day_int])->first();

             Schedule::create(array(
                 'month_id' => $month->id,
                 'days_id' => $day->id,
                 'day' =>$target->day,
                 'tag' => $request->tag,
                 'title' => $request->title,
                 'start' => $request->start,
                 'end' => $request->end,
             ));

            toast('Creation Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();
    }
    public static function DeleteEvent($id)
    {
        Schedule::find($id)->delete();
        toast('Deletion Successful','success');
        return redirect()->back();

    }
    public static function  GenerateCalender()
    {
        $carbon_year = env('year');

        $year = "{$carbon_year}";

        $query = Calender::where(['year'=> $year])->first();

        //generate the calender for the year
        if(!$query)
        {
            $leap = false;
            if ((intval($year) % 4 == 0) && (intval($year)  % 100 != 0) || (intval($year)  % 400 == 0)) $leap = true;

            $months = [
                'january' ,
                'february',
                'march',
                'april',
                'may',
                'june',
                'july',
                'august',
                'september',
                'october',
                'november',
                'december',
            ];
            $days = [
                'january'=> 31,
                'february'=> $leap ? 29 : 28,
                'march'=>31,
                'april'=>30,
                'may'=>31,
                'june'=>30,
                'july'=>31,
                'august'=>31,
                'september'=> 30,
                'october'=>31,
                'november'=>30,
                'december'=>31,
            ];
            //generate year
            $calender = Calender::create(array(
                'year'=> $year
            ));

            $count = 0;
            //generate months & dates
            for($j = 0; $j < count($months); $j++)
            {
                ++$count;
                $month = Month::create(array(
                    'name'=> $months[$j],
                    'calender_id' => $calender->id
                ));

                for ($i = 1; $i <= $days[$months[$j]]; $i++) {
                    $input = $i > 9 ? "{$i}/{$count}/{$year} " : "0{$i}/{$count}/{$year}";

                    $model = Day::create(array(
                        'month_id'=> $month->id,
                        'name'=> Carbon::createFromFormat('d/m/Y', trim($input))->dayName,
                        'day'=> $i,
                    ));
                }
            }
        }

    }
    public static function CreatePayment(Request $request)
    {
        try
        {
            Payment::create(array(
                'registras_id' => $request->registras_id,
                'currency'=> $request->currency,
                'amount'=> $request->amount,
                'start'=> $request->start,
                'end' => $request->end,
                'path'=> UploadController::UploadFile($request, 'file'),
            ));

            toast('Creation Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();

    }
    public static function DeletePayment($id)
    {
        Payment::find($id)->delete();
        toast('Deletion Successful','success');
        return redirect()->back();

    }
    public static function CreateUser(Request $request)
    {
        try
        {
            User::create(array(
                'first_name' => $request->first_name,
                'last_name'=> $request->last_name,
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
                'image'=> UploadController::UploadFile($request, 'file'),
            ));

            toast('Creation Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();

    }
    public static function UpdateUser(Request $request)
    {
        try
        {
            $user = User::find($request->id);

            $user->update(array(
                'first_name' => $request->first_name,
                'last_name'=> $request->last_name,
                'email'=> $request->email,
                'password'=> $request->change_password ? bcrypt($request->change_password) : $user->password,
                'image'=> $request->file ? UploadController::UploadFile($request, 'file') : $user->image,
            ));

            toast('Update Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();

    }
    public static function DeleteUser($id)
    {
        User::find($id)->delete();
        toast('Deletion Successful','success');
        return redirect()->back();

    }
}
