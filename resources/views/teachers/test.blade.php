@php
$names = [
    "Abdureşit",
    "Gurban",
    "Aşyrgeldi",
    "Atamuhammet",
    "Begli",
    "Begmyrat",
    "Esen",
    "Ismail",
    "Guwanç",
    "Işanguly",
    "Medine",
    "Muhammetnur",
    "Nedirşa",
    "Oraz",
    "Rahman",
    "Raşit",
    "Röwşen",
    "Suhan",
    "Şatlyk"
];


$methods = [

// CONTROLLER
"index()",
"create()",
"store()",
"show()",
"edit()",
"update()",
"destroy()",
"redirect()",
"view()",
"compact()",
"with()",
"back()",
"request()->all()",
"request()->input()",

// ROUTE
"Route::get()",
"Route::post()",
"Route::put()",
"Route::delete()",
"Route::patch()",
"Route::resource()",
"Route::name()",
"Route::middleware()",
"Route::group()",
"Route::prefix()",
"Route::controller()",
"Route::fallback()",
"route()",
"url()",

// MODEL & ELOQUENT
"all()",
"find()",
"findOrFail()",
"first()",
"firstOrFail()",
"create()",
"save()",
"update()",
"delete()",
"where()",
"orWhere()",
"orderBy()",
"latest()",
"oldest()",
"count()",
"paginate()",
"simplePaginate()",
"pluck()",
"select()",
"get()",
"hasMany()",
"belongsTo()",
"hasOne()",
"with()",
"load()",

// RELATIONSHIP EXTRA
"attach()",
"detach()",
"withCount()",
"whereHas()",
"doesntHave()",
"associate()",
"dissociate()",
"\$fillable",
"\$hidden",

// MIGRATIONS
"Schema::create()",
"Schema::table()",
"\$table->id()",
"\$table->string()",
"\$table->integer()",
"\$table->bigInteger()",
"\$table->boolean()",
"\$table->enum()",
"\$table->text()",
"\$table->foreignId()",
"\$table->timestamps()",
"\$table->nullable()",
"\$table->default()",
"\$table->unique()",
"Schema::dropIfExists()",

// SEEDER & FACTORY
"php artisan make:seeder",
"php artisan db:seed",
"php artisan make:factory",
"Model::factory()",
"factory()->count()",
"factory()->create()",
"definition()",
"DatabaseSeeder",
"\$this->call()",
"fake()->name()",

// AUTH
"auth()->check()",
"auth()->user()",
"auth()->id()",
"Auth::attempt()",
"auth()->logout()",
"bcrypt()",
"Hash::make()",
"middleware('auth')",
"@auth",

// MIDDLEWARE
"\$next(\$request)",
"abort()",
"request()->user()",
"withoutMiddleware()",

// ENV & ARTISAN
".env",
"DB_DATABASE",
"php artisan migrate",
"php artisan migrate:fresh",
"php artisan route:list",

];
shuffle($methods);


$index = 0;

for($i=0; $i < 95 ; $i++) {
    echo $methods[$i] . "<br>";
    
    if ($i % 5 == 0) {
    echo "<h2>" .  $names[$index] .   "</h2>";
    $index++;
    }


}
@endphp


