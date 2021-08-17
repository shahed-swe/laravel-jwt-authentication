<?php
//    use Image;

//UID creator
class Helper{
    function makeUID(){
        return time().rand(100000,999999);
    }
}


//Global image file uploader
function uploadImage($request, $name, $path, $imageName, $width, $height ){
   if($request->hasFile($name)){
       $image = $request->file($name);
       $filename = $imageName .'.'. $image->getClientOriginalExtension();
       $location = public_path($path.'/'.$filename);
       Image::make($image)->fit($width, $height, function($constraint){
            $constraint->aspectRatio();
        })->save($location);
       return $path.'/'.$filename;
   }
   return ' ';
}

//Global image upload editor
//function editImage($request, $name, $path, $imageName, $old_image ){
//    if($request->hasFile($name)){
//        $image = $request->file($name);
//        $filename = $imageName .'.'. $image->getClientOriginalExtension();
//        $location = public_path($path.'/'.$filename);
//        Image::make($image)->save($location);
//        $im = $path.'/'.$filename;
//        if(strlen($old_image) > 0 && file_exists(base_path().'/public/'.$old_image)) {
//            unlink(base_path().'/public/'.$old_image);
//        }
//        return $im;
//    }
//    return ' ';
//}

//Global image deleter
//function deleteImage($imageName){
//    if(strlen($imageName) > 0 && file_exists(base_path().'/public/'.$imageName)) {
//        unlink(base_path().'/public/'.$imageName);
//    }
//}

//Format date in bengali
function bengaliDateFormatter($date){
    $date = date('d M, Y',strtotime($date));
    $numbers = [
        "০","১","২","৩","৪","৫","৬","৭","৮","৯"
    ];
    $months = [
        'Jan' => "জানুয়ারী",
        'Feb' => "ফেব্রুয়ারী",
        'Mar' => "মার্চ",
        'Apr' => "এপ্রিল",
        'May' => "মে",
        'Jun' => "জুন",
        'Jul' => "জুলাই",
        'Aug' => "অগাস্ট",
        'Sep' => "সেপ্টেম্বর",
        'Oct' => "অক্টোবর",
        'Nov' => "নভেম্বর",
        'Dec' => "ডিসেম্বর"
    ];
    foreach ($numbers as $key => $num){
        $date = str_replace($key,$num,$date);
    }
    foreach ($months as $key => $month){
        $date = str_replace($key,$month,$date);
    }
    return $date;
}

//Format taka in bengali
function takaFormatter($taka){
    $numbers = [
        "০","১","২","৩","৪","৫","৬","৭","৮","৯"
    ];
    setlocale(LC_MONETARY,"en_US");
    $taka = asDollars($taka);
    foreach ($numbers as $key => $num){
        $taka = str_replace($key,$num,$taka);
    }
    return $taka;
}

//Format number in bengali
function numberToBengali($data){
    $numbers = [
        "০","১","২","৩","৪","৫","৬","৭","৮","৯"
    ];
    foreach ($numbers as $key => $num){
        $data = str_replace($key,$num,$data);
    }
    return $data;
}

//Format currency with comma
function asDollars($value) {
    $value = (float)$value;
    if ($value<0) return "-".asDollars(-$value);
    return number_format($value, 2);
}
//Format day in bengali
function dayFormatter($day){
    $days = [
        "Saturday"  =>"শনিবার",
        "Sunday"    =>"রবিবার",
        "Monday"    =>"সোমবার",
        "Tuesday"   =>"মঙ্গলবার",
        "Wednesday" =>"বুধবার",
        "Thursday"  =>"বৃহস্পতিবার",
        "Friday"    =>"শুক্রবার"
    ];
    return $days[$day];
}
//Format unit in bengali
function unitFormatter($unit){
    $units = [
        "Kg"      =>"কেজি",
        "Pc"      =>"পিস",
        "Packet"  =>"প্যাকেট",
        "Bosta"   =>"বস্তা",
    ];
    if($unit){
        return $units[$unit];
    }
    return $units['Kg'];
}

//All days in a week in bengali
function days(){
    return [
        "Saturday"  =>"শনিবার",
        "Sunday"    =>"রবিবার",
        "Monday"    =>"সোমবার",
        "Tuesday"   =>"মঙ্গলবার",
        "Wednesday" =>"বুধবার",
        "Thursday"  =>"বৃহস্পতিবার",
        "Friday"    =>"শুক্রবার"
    ];
}

//Attendance status in bengali
function attendanceFormatter($data){
    if ($data == 'Absent'){
        return 'অনুপস্থিত';
    } elseif ($data == 'Present'){
        return 'উপস্থিত';
    } elseif ($data=='On vacation') {
        return 'ছুটি';
    }
}

//Format number in bengali month
function numberToMonth($num){
    $months = [
        '1' => 'জানুয়ারী',
        '2' => 'ফেব্রুয়ারী',
        '3' => 'মার্চ',
        '4' => 'এপ্রিল',
        '5' => 'মে',
        '6' => 'জুন',
        '7' => 'জুলাই',
        '8' => 'অগাস্ট',
        '9' => 'সেপ্টেম্বর',
        '10' => 'অক্টোবর',
        '11' => 'নভেম্বর',
        '12' => 'ডিসেম্বর'
    ];
    return $months[$num];
}

//Get all months in bengali
function bengaliMonths(){
    return [
        '1' => 'জানুয়ারী',
        '2' => 'ফেব্রুয়ারী',
        '3' => 'মার্চ',
        '4' => 'এপ্রিল',
        '5' => 'মে',
        '6' => 'জুন',
        '7' => 'জুলাই',
        '8' => 'অগাস্ট',
        '9' => 'সেপ্টেম্বর',
        '10' => 'অক্টোবর',
        '11' => 'নভেম্বর',
        '12' => 'ডিসেম্বর'
    ];
}

//Check a day occurrence in a month
function dayInMonth($day,$month_year){
    $days_in_month = \Carbon\Carbon::parse($month_year)->daysInMonth;
    $first_day_in_month = 'first '.$day.' of '.$month_year;
    $first_day_in_month =  (int) \Carbon\Carbon::parse($first_day_in_month)->format('d');
    $occurance = 0;
    for ($i = $first_day_in_month; $i<= $days_in_month; $i+=7){
        $occurance++;
    }
    return $occurance;
}

//Change bengali number to english
function bengaliToEnglishNumber($number){
    $numbers = [
        "০" => '0',
        "১" => '1',
        "২" => '2',
        "৩" => '3',
        "৪" => '4',
        "৫" => '5',
        "৬" => '6',
        "৭" => '7',
        "৮" => '8',
        "৯" => '9'
    ];
    foreach ($numbers as $key => $value){
        $number = str_replace($key,$value,$number);
    }
    $number = round(str_replace(',','',$number),2);
    return $number;
}
//change english number to bengali
function englishToBengaliNumber($number){
    $number = round(str_replace(',','',$number),2);
    $numbers = [
        '0' => "০",
        '1' => "১",
        '2' => "২",
        '3' => "৩",
        '4' => "৪",
        '5' => "৫",
        '6' => "৬",
        '7' => "৭",
        '8' => "৮",
        '9' => "৯"
    ];
    foreach ($numbers as $key => $value){
        $number = str_replace($key,$value,$number);
    }

    return $number;
}
//Generate random string
function generateRandomString($length = 6){
    $prefix = '';
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $randomString = $prefix . $randomString;
    return $randomString;
}



// Get User IP Address
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}