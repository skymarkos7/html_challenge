public function contactsPerCountry()
{
    $countries = Contact::select('country_code', DB::raw('count(*) as total'))
        ->groupBy('country_code')
        ->get();

    return view('contacts.perCountry', compact('countries'));
}
