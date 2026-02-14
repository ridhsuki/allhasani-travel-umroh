<img src="{{ $site_settings->logo_path ? asset("storage/{$site_settings->logo_path}") : asset('assets/img/default-logo.jpeg') }}"
    alt="Company Logo {{ $site_settings->company_name }}" loading="lazy"
    {{ $attributes->merge(['class' => 'w-16 h-16 object-cover rounded-full']) }}>
