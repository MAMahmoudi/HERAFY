<?php

// Helpers available in every controller and view

function Clean_String($My_String)
{
    $My_String = trim((string)$My_String);
    $My_String = strip_tags($My_String);
    return $My_String;
}

// Escapes a value before printing it in HTML
function Esc($My_String)
{
    return htmlspecialchars((string)$My_String, ENT_QUOTES, 'UTF-8');
}

// Full URL of a page, e.g. Url('Profile/3')
function Url($My_Path = '')
{
    return My_Files_Root . ltrim($My_Path, '/');
}

// URL of a file in /public (assets or uploads), with a fallback when the path is empty
function Asset($My_Path, $Default = 'assets/IMAGES/user-1.png')
{
    $My_Path = $My_Path ?: $Default;
    if (preg_match('#^https?://#', $My_Path)) {
        return $My_Path;
    }
    return My_Files_Root . ltrim($My_Path, '/');
}

function Redirect_To($My_location)
{
    header("Location: " . Url($My_location));
    die;
}

// Redirects to a page given by the user (form field "return_to") only if it is a local path
function Redirect_Back($Default = '')
{
    $Return_To = $_POST['return_to'] ?? '';
    if (!is_string($Return_To) || $Return_To === '' || !preg_match('#^[A-Za-z0-9_/\-?=&.]*$#', $Return_To) || str_contains($Return_To, '//') || str_contains($Return_To, '..')) {
        $Return_To = $Default;
    }
    Redirect_To($Return_To);
}

function Is_Post()
{
    return ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';
}

function Start_Session()
{
    if (session_status() === PHP_SESSION_NONE && PHP_SAPI !== 'cli') {
        session_set_cookie_params([
            'httponly' => true,
            'samesite' => 'Lax',
            'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        ]);
        session_name('HERAFY_SESSION');
        session_start();
    }
}

/* ---------- CSRF protection ---------- */

function Csrf_Token()
{
    if (empty($_SESSION['Csrf_Token'])) {
        $_SESSION['Csrf_Token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['Csrf_Token'];
}

function Csrf_Field()
{
    return '<input type="hidden" name="csrf_token" value="' . Esc(Csrf_Token()) . '">';
}

function Verify_Csrf()
{
    $Token = $_POST['csrf_token'] ?? '';
    if (!is_string($Token) || !hash_equals(Csrf_Token(), $Token)) {
        http_response_code(419);
        Flash('error', 'انتهت صلاحية النموذج، الرجاء المحاولة مرة أخرى');
        Redirect_Back();
    }
}

/* ---------- Flash messages (shown once on the next page) ---------- */

function Flash($Type, $Message)
{
    $_SESSION['Flash'][] = ['type' => $Type, 'message' => $Message];
}

function Take_Flash_Messages()
{
    $Messages = $_SESSION['Flash'] ?? [];
    unset($_SESSION['Flash']);
    return $Messages;
}

// Value previously typed in a form field, to refill it after a validation error
function Old($Field, $Default = '')
{
    $Value = $_POST[$Field] ?? $Default;
    return is_string($Value) ? Esc($Value) : '';
}

/* ---------- Authentication ---------- */

// $Type is "account" (craftsman) or "company"
function Login_User($Type, $User)
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_regenerate_id(true);
    }
    $_SESSION['User'] = [
        'type' => $Type,
        'id' => (int)$User['id'],
        'name' => $Type === 'account' ? $User['first_name'] . ' ' . $User['last_name'] : $User['name'],
        'avatar' => $Type === 'account' ? ($User['avatar'] ?? null) : ($User['logo'] ?? null),
    ];
}

function Logout_User()
{
    $_SESSION = [];
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_regenerate_id(true);
    }
}

function Current_User()
{
    return $_SESSION['User'] ?? null;
}

function Is_Logged_In($Type = null)
{
    $User = Current_User();
    return $User !== null && ($Type === null || $User['type'] === $Type);
}

function Require_Login($Type = null)
{
    if (!Is_Logged_In($Type)) {
        Flash('error', $Type === 'company' ? 'هذه الصفحة خاصة بحسابات الشركات' : 'الرجاء تسجيل الدخول أولا');
        Redirect_To('Login');
    }
}

// Link to the public page of the logged in user
function Own_Page_Url()
{
    $User = Current_User();
    if (!$User) {
        return Url('Login');
    }
    return Url(($User['type'] === 'company' ? 'Company_Page/' : 'Profile/') . $User['id']);
}

/* ---------- Validation ---------- */

// Password + confirmation of the craftsman and company forms
function Verify_Password($My_Data, &$My_Errors)
{
    $Password = $My_Data['password'] ?? '';
    if ($Password === '') {
        $My_Errors['password'] = "الرجاء ادخال كلمة المرور";
    } elseif (strlen($Password) < 8) {
        $My_Errors['password'] = "كلمة المرور يجب أن تحتوي على 8 أحرف على الأقل";
    }

    if (($My_Data['password_confirm'] ?? '') === '') {
        $My_Errors['password_confirm'] = "الرجاء ادخال كلمة المرور مره اخرى";
    } elseif ($My_Data['password_confirm'] !== $Password) {
        $My_Errors['password_confirm'] = "كلمة المرور غير متطابقة";
    }
}

/* ---------- Formatting ---------- */

function Time_Ago($Date_Time)
{
    $Seconds = time() - strtotime((string)$Date_Time);
    if ($Seconds < 60) {
        return 'الآن';
    }
    $Units = [
        [31536000, 'سنة'],
        [2592000, 'شهر'],
        [86400, 'يوم'],
        [3600, 'ساعة'],
        [60, 'دقيقة'],
    ];
    foreach ($Units as [$Length, $Name]) {
        if ($Seconds >= $Length) {
            return 'منذ ' . floor($Seconds / $Length) . ' ' . $Name;
        }
    }
    return '';
}

function Format_Price($Price)
{
    if ($Price === null || $Price === '') {
        return 'السعر عند الطلب';
    }
    // U+2066 / U+2069 isolate the number so the right-to-left text does not reorder its groups
    return "\u{2066}" . number_format((float)$Price, 0, ',', ' ') . "\u{2069} د.ج";
}

// Name and picture of a post author, whatever its type (rows come from Post::Feed)
function Post_Author($Post)
{
    if ($Post['author_type'] === 'company') {
        return [
            'name' => $Post['company_name'],
            'subtitle' => 'شركة',
            'image' => Asset($Post['company_logo']),
            'url' => Url('Company_Page/' . $Post['author_id']),
        ];
    }
    return [
        'name' => $Post['first_name'] . ' ' . $Post['last_name'],
        'subtitle' => trim(($Post['service_name'] ?? '') . ' - ' . ($Post['city'] ?? ''), ' -'),
        'image' => Asset($Post['avatar']),
        'url' => Url('Profile/' . $Post['author_id']),
    ];
}

/* ---------- Uploads ---------- */

// Saves an uploaded image in public/uploads/$Folder and returns its public path,
// null when no file was sent, or false (with $Error set) when the file is refused.
function Upload_Image($File, $Folder, &$Error = null)
{
    if (!is_array($File) || ($File['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
        return null;
    }
    if ($File['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($File['tmp_name'])) {
        $Error = 'تعذر رفع الصورة';
        return false;
    }
    if ($File['size'] > My_Max_Upload_Size) {
        $Error = 'حجم الصورة يجب ألا يتجاوز 2 ميغابايت';
        return false;
    }
    $Extensions = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/gif' => 'gif', 'image/webp' => 'webp'];
    $Mime = (new finfo(FILEINFO_MIME_TYPE))->file($File['tmp_name']);
    if (!isset($Extensions[$Mime])) {
        $Error = 'الصيغ المقبولة: JPG, PNG, GIF, WEBP';
        return false;
    }
    $Directory = My_Uploads_Path . '/' . $Folder;
    if (!is_dir($Directory)) {
        mkdir($Directory, 0775, true);
    }
    $File_Name = bin2hex(random_bytes(12)) . '.' . $Extensions[$Mime];
    if (!move_uploaded_file($File['tmp_name'], $Directory . '/' . $File_Name)) {
        $Error = 'تعذر حفظ الصورة';
        return false;
    }
    return 'uploads/' . $Folder . '/' . $File_Name;
}

// Deletes a previously uploaded file (never touches the bundled assets)
function Delete_Upload($My_Path)
{
    if (is_string($My_Path) && str_starts_with($My_Path, 'uploads/') && !str_contains($My_Path, '..')) {
        $Full_Path = My_Public_Path . '/' . $My_Path;
        if (is_file($Full_Path)) {
            unlink($Full_Path);
        }
    }
}
