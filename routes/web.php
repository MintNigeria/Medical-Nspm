<?php

use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DependentController;
use App\Http\Controllers\InjuryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\AllergyController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ManagementController;
use App\Models\Dependent;
use App\Models\Pharmacy;
use App\Models\Record;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get("/test", function() {
//     return view("log-viewer::index");
// });

Route::middleware(['auth', 'role:admin,editor'])->group(function () {
    Route::get('/home', [UserController::class, 'home']);
});

/** Patients  CRUD */
// All Listings
Route::get('patient/', [PatientController::class, 'index'])->middleware('auth');
Route::get('patient/archive', [PatientController::class, 'archive'])->middleware('auth');
Route::post('patient/import-excel', [PatientController::class, 'import'])->name("import.excel")->middleware('auth');




/** ALLERGY CRUD */
Route::get("allergies/{patientId}/view", [AllergyController::class, 'view'])->middleware("auth");
Route::get("allergies/{patientId}/create", [AllergyController::class, 'create'])->middleware("auth");
Route::post("allergies/{patientId}/", [AllergyController::class, 'store'])->middleware("auth");


// Show Create Form
Route::get('/patient/create', [PatientController::class, 'create'])->middleware(
    'auth'
);

// Store Listing Data
Route::post('/patient', [PatientController::class, 'store'])->middleware(
    'auth'
);

// Show Edit Form
Route::get('/patient/{patient}/edit', [
    PatientController::class,
    'edit',
])->middleware('auth');

// // Update Listing
Route::put('/patient/{patient}', [
    PatientController::class,
    'update',
])->middleware('auth');

Route::put('/patient/{patient}/activate', [
    PatientController::class,
    'activate',
])->middleware('auth');

Route::put('/patient/{patient}/dob', [
    PatientController::class,
    'update_dob',
])->middleware('auth');

Route::get('/patient/export/', [PatientController::class, 'export']);

// Delete Listing
Route::delete('/patient/{patient}', [
    PatientController::class,
    'destroy',
])->middleware('auth')->withTrashed();

Route::post('/patient/{patient}/restore', [
    PatientController::class,
    'restore',
])->middleware('auth')->withTrashed();

// // Single Listing
// Route::get('/patient/{patient}', [PatientController::class, 'show']);

//Records

Route::get('/records', [RecordController::class, 'index'])->middleware('auth');
Route::get('/records/queue', [RecordController::class, 'queue'])->middleware('auth');
Route::get('/records/reports', [RecordController::class, 'reports'])->middleware('auth');

// // Show Create Form
// Route::get('/record/create', [RecordController::class, 'create']);

//View Open Records
Route::get('/records/manage', [RecordController::class, 'open'])->middleware(
    'auth'
);

//View Pharmacy Records
Route::get('/records/preview', [
    RecordController::class,
    'preview',
])->middleware('auth');

Route::get('/records/{management}/preview', [
    RecordController::class,
    'preview_report',
])->middleware('auth');

Route::get('/records/{management}/referraldoc', [
    RecordController::class,
    'referral_doc',
])->middleware('auth');

//View Pharmacy Records
Route::get('/records/pharmacy', [
    RecordController::class,
    'pharmacy',
])->middleware('auth');

// Store Records Data
Route::post('/record', [RecordController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/records/{slug}/edit', [RecordController::class, 'edit'])
    ->name('records.edit')
    ->middleware('auth');
// Update Listing
Route::put('/record/{record}', [RecordController::class, 'update'])->middleware(
    'auth'
);
Route::put('/record/{record}/flag_success', [
    RecordController::class,
    'flag_success',
])->middleware('auth');

//
Route::put('/record/{record}/flag_nurse', [
    RecordController::class,
    'flag_nurse',
])->middleware('auth');

Route::put('/record/{record}/flag_nurse_fail', [
    RecordController::class,
    'flag_nurse_fail',
])->middleware('auth');

Route::put('/record/{record}/flag_prescription', [
    RecordController::class,
    'flag_prescription',
])->middleware('auth');

Route::put('/record/{record}/flag_prescription_fail', [
    RecordController::class,
    'flag_prescription_fail',
])->middleware('auth');


//

Route::put('/record/{record}/flag_nt_stock', [
    RecordController::class,
    'flag_nt_stock',
])->middleware('auth');

Route::put('/record/{record}/add_defacto', [
    RecordController::class,
    'add_defacto',
])->middleware('auth');

//Get All Records for A Patient
Route::get('/records/{patientId}/view', [
    RecordController::class,
    'view_patient',
])->middleware('auth');

// Single Listing
Route::get('/records/all', [RecordController::class, 'all'])->middleware(
    'auth'
);


// Single Listing
Route::get('/record/{record}', [RecordController::class, 'show'])->middleware(
    'auth'
);

//Inventory
Route::get('/inventory', [InventoryController::class, 'index'])->middleware(
    'auth'
);
Route::get('/inventory/archive', [InventoryController::class, 'archive'])->middleware(
    'auth'
);

Route::get('inventory/stock_low', [InventoryController::class, 'stock_low'])->middleware(
    'auth'
);

//Create New Inventory
Route::get('/inventory/create', [
    InventoryController::class,
    'create',
])->middleware('auth');
Route::post('/inventory', [InventoryController::class, 'store'])->middleware(
    'auth'
);

//Edit Inventory Data
Route::get('/inventory/{inventory}/edit', [
    InventoryController::class,
    'edit',
])->middleware('auth');


Route::put('/inventory/{inventory}', [
    InventoryController::class,
    'update',
])->middleware('auth');

//Adjust Inventory Units By One

Route::put('/inventory/{id}/increment', [
    InventoryController::class,
    'increment',
])->middleware('auth');
Route::put('/inventory/{id}/reduce', [
    InventoryController::class,
    'reduce',
])->middleware('auth');

//Delete Inventory Data
Route::delete('/inventory/{inventory}', [
    InventoryController::class,
    'destroy',
])->middleware('auth')->withTrashed();

Route::post('/inventory/{inventory}/restore', [InventoryController::class, 'restore'])->middleware(
    'auth'
)->withTrashed();

// View All Leaves
Route::get('/leaves', [LeaveController::class, 'index'])->middleware('auth');
Route::get('/leaves/archive', [LeaveController::class, 'archive'])->middleware('auth');

//Create Leave
Route::get('/leaves/create', [LeaveController::class, 'create'])->middleware(
    'auth'
);

Route::get('/leaves/{leave}/receipt', [
    LeaveController::class,
    'receipt',
])->middleware('auth');

Route::post('/leaves', [LeaveController::class, 'store'])->middleware('auth');

Route::put('/leaves/{leave}', [
    LeaveController::class,
    'update',
])->middleware('auth');

//Delete Medical Leave
Route::delete('/leaves/{leave}', [
    LeaveController::class,
    'destroy',
])->middleware('auth')->withTrashed();

Route::post('/leaves/{leave}/restore', [
    LeaveController::class,
    'restore',
])->middleware('auth')->withTrashed();

//Treat Dependents
Route::get('/dependents', [
    DependentController::class,
    'user_index',
])->middleware('auth');


Route::get('/dependents/{patient}/dependent', [
    DependentController::class,
    'index',
])->middleware('auth');

Route::post('/dependent/{patient}/', [DependentController::class, 'store']);
Route::get('/dependents/{dependent}/edit', [
    DependentController::class,
    'edit',
])->middleware('auth');

Route::put('/dependents/{dependent}/', [
    DependentController::class,
    'update',
])->middleware('auth');

Route::get('/dependents/manage', [
    DependentController::class,
    'manage',
])->middleware('auth');

//Flag the Doctor's Request
Route::put('/dependents/{dependent}/flag_success', [
    DependentController::class,
    'flag_success',
])->middleware('auth');

Route::put('/dependents/{dependent}/flag_success', [
    DependentController::class,
    'flag_nt_stock',
])->middleware('auth');

/** Pharmacy */
Route::get('/pharmacy', [PharmacyController::class, 'index'])->middleware(
    'auth'
);



Route::get('/pharmacy/archive', [PharmacyController::class, 'archive'])->middleware(
    'auth'
);
Route::get('/pharmacy/create', [
    PharmacyController::class,
    'create',
])->middleware('auth');

Route::post('/pharmacy', [PharmacyController::class, 'store'])->middleware(
    'auth'
);

Route::put('/pharmacy/{pharmacy}', [PharmacyController::class, 'update'])->middleware(
    'auth'
);

Route::delete('/pharmacy/{pharmacy}', [PharmacyController::class, 'destroy'])->middleware(
    'auth'
)->withTrashed();

Route::post('/pharmacy/{pharmacy}/restore', [PharmacyController::class, 'restore'])->middleware(
    'auth'
)->withTrashed();

/** Clinics  */
Route::get('/retainers', [ClinicController::class, 'index'])->middleware('auth');
Route::get('/retainers/archive', [ClinicController::class, 'archive'])->middleware('auth');
Route::get('/retainers/create', [ClinicController::class, 'create'])->middleware(
    'auth'
);
Route::post('/clinics', [ClinicController::class, 'store'])->middleware('auth');
Route::put('/clinics/{clinic}/activate', [ClinicController::class, 'activate'])->middleware(
    'auth'
);
Route::put('/clinics/{clinic}', [ClinicController::class, 'update'])->middleware(
    'auth'
);
Route::delete('/clinics/{clinic}', [
    ClinicController::class,
    'destroy',
])->middleware('auth')->withTrashed();

Route::post('/clinics/{clinic}/restore', [
    ClinicController::class,
    'restore',
])->middleware('auth')->withTrashed();

/** Receipts */
Route::get('/receipts', [ReceiptController::class, 'index'])->middleware(
    'auth'
);
Route::get('/records/receipt', [
    RecordController::class,
    'receipts',
])->middleware('auth');

Route::get('/records/nurse_mgmt', [
    RecordController::class,
    'nurse_mgmt',
])->middleware('auth');

Route::post('/records/process/{slug}/', [
    RecordController::class,
    'updateStatusAndRedirect',
])
    ->name('records.updateStatusAndRedirect')
    ->middleware('auth');
Route::get('/receipts/{record}/create', [
    ReceiptController::class,
    'create',
])->middleware('auth');
Route::post('/receipts/record/', [
    ReceiptController::class,
    'store',
])->middleware('auth');
Route::delete('/receipts/{receipt}/', [
    ReceiptController::class,
    'destroy',
])->middleware('auth');

/** Groups */
Route::get('/grouping', [GroupController::class, 'index'])->middleware("auth");
Route::get('/grouping/create', [GroupController::class, 'create'])->middleware("auth");
Route::post('/grouping', [GroupController::class, 'store'])->middleware("auth");
Route::put("/grouping/{grouping}", [GroupController::class, 'update'])->middleware("auth");
Route::delete('/grouping/{grouping}',[GroupController::class, 'destroy'])->middleware("auth")->withTrashed();

/** Users */
Route::get('/users', [UserController::class, 'index'])->middleware('auth');
Route::get('/activity/logs', [UserController::class, 'activity'])->middleware('auth');
Route::get("/users/profile", [UserController::class, 'profile'])->middleware("auth");
Route::post('/profile', [UserController::class, 'updatePassword'])->middleware(
    'auth'
);
Route::get('/users/archive', [UserController::class, 'archive'])->middleware(
    'auth'
);

Route::get('/users/register', [UserController::class, 'create'])->middleware(
    'auth'
);
Route::post('/users/create', [UserController::class, 'store'])->middleware(
    'auth'
);


Route::put('/users/{user}/activate', [UserController::class, 'activate'])->middleware(
    'auth'
);

Route::put('/users/{user}', [UserController::class, 'update'])->middleware(
    'auth'
);

Route::put('/users/{user}/resetPassword', [UserController::class, 'resetPassword'])->middleware(
    'auth'
);

Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware(
    'auth'
)->withTrashed();

Route::post('/users/{user}/restore', [UserController::class, 'restore'])->middleware(
    'auth'
)->withTrashed();


// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/users/login', [UserController::class, 'login'])
    ->name('login')
    ->middleware('guest');

Route::post('/users', [UserController::class, 'auth'])->middleware('guest');

//Injuries CRUD
Route::get('/injuries/create', [InjuryController::class, 'create'])->middleware(
    'auth'
);

Route::get('/injuries/archive', [InjuryController::class, 'archive'])->middleware(
    'auth'
);


Route::get('/injuries', [InjuryController::class, 'index'])->middleware('auth');
Route::post('/injuries', [InjuryController::class, 'store'])->middleware(
    'auth'
);

Route::get('/injuries/{injury}/insurance', [InjuryController::class, 'insurance'])->middleware(
    'auth'
);

Route::put('/injuries/{injury}/insurance', [InjuryController::class, 'insurance_update'])->middleware(
    'auth'
);
Route::put('/injuries/{injury}', [InjuryController::class, 'update'])->middleware(
    'auth'
);
Route::delete('/injuries/{injury}', [InjuryController::class, 'destroy'])->middleware(
    'auth'
)->withTrashed();

Route::post('/injuries/{injury}/restore', [InjuryController::class, 'restore'])->middleware(
    'auth'
)->withTrashed();



// Feedbacks
Route::get("feedbacks/{recordId}/index", [FeedbackController::class, 'index'])->middleware("auth")->name('feedbacks.index');
Route::get("records/{recordId}/feedbacks", [FeedbackController::class, 'feedbacks'])->middleware("auth");
Route::get("feedbacks/{recordId}/create", [FeedbackController::class, 'create'])->middleware("auth");
Route::post("feedbacks/{recordId}/", [FeedbackController::class, 'store'])->middleware("auth");
Route::delete('/feedbacks/{feedback}', [FeedbackController::class, 'destroy'])->middleware(
    'auth'
);




Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'management'], function () {
        Route::get('/{record}', [ManagementController::class, 'index']);
        Route::get('/{management}/edit', [ManagementController::class, 'edit']);
        Route::put('/{management}/nurse_response', [ManagementController::class, 'nurse_response']);
        Route::put('/{management}/pharmacy_response', [ManagementController::class, 'pharmacy_response']);
        Route::put('/{management}/reason', [ManagementController::class, 'reason']);
        Route::put('/{management}', [ManagementController::class, 'update']);
        Route::get('/{record}/create', [ManagementController::class, 'create']);
        Route::post('/{record}', [ManagementController::class, 'store']);
        Route::put('{department}', [ManagementController::class, 'update']);
        Route::put('{department}/activate', [ManagementController::class, 'activate']);
    });
});
