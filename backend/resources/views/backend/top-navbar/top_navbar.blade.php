@extends('admin.master')
@section('admin')
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Top Navbar Settings</h4>
                </div>
            </div>

            <!-- Form for updating settings -->
            <div class="row">
                <div class="col-12">

                    {{-- The '$topnav' variable would be passed from controller. --}}
                    <form action="{{ route('update.topnav', $topnav->id) }}" method="POST">
                        @csrf

                        <!-- First Card: Contact Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Contact Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Address Input -->
                                    <div class="col-md-6 mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i data-feather="map-pin"
                                                    class="icon-sm"></i></span>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Street 2011, #290 , Phnom Penh, Cambodia"
                                                value="{{ $topnav->address ?? '' }}">
                                        </div>
                                    </div>
                                    <!-- Email Input -->
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i data-feather="mail"
                                                    class="icon-sm"></i></span>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="company-email@example.com" value="{{ $topnav->email ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Second Card: Social Media Links -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Social Media Links</h5>
                                <p class="card-subtitle mt-1 text-muted">Enter the full URL for each social media profile.
                                    Use the toggles to show or hide the icon on the website.</p>
                            </div>


                            <div class="card-body">
                                <div class="row g-3">

                                                        {{-- 
                                Function 1: The Config Array
                                This array holds all the settings for the social links. 
                                To add or remove a link from the form, you only need to change it here.
                            --}}
                                    @php
                                        $socials = [
                                            'facebook' => ['icon' => 'facebook', 'label' => 'Facebook'],
                                            'linkedin' => ['icon' => 'linkedin', 'label' => 'LinkedIn'],
                                            'twitter' => ['icon' => 'twitter', 'label' => 'X (Twitter)'],
                                            'instagram' => ['icon' => 'instagram', 'label' => 'Instagram'],
                                            'youtube' => ['icon' => 'youtube', 'label' => 'YouTube'],
                                            'telegram' => ['icon' => 'send', 'label' => 'Telegram'],
                                        ];
                                    @endphp

                                                        {{-- 
                                Function 2: The Loop
                                This iterates through the $socials array to build the HTML for each link,
                                preventing you from having to write the same code six times.
                            --}}
                                    @foreach ($socials as $key => $details)
                                        <div class="col-md-6">
                                            <label for="{{ $key }}_url"
                                                class="form-label">{{ $details['label'] }}</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i data-feather="{{ $details['icon'] }}"
                                                        class="icon-sm"></i></span>

                                                                    {{-- 
                                            Function 3: Dynamic Value
                                            This dynamically builds the property name to get the correct value from the database.
                                            For example, when $key is 'facebook', this becomes `value="{{ $topnav->facebook_url }}"`.
                                            The `?? ''` is a shortcut for "if the value is null, use an empty string instead".
                                        --}}
                                                <input type="url" class="form-control" id="{{ $key }}_url"
                                                    name="{{ $key }}_url" placeholder="https://..."
                                                    value="{{ $topnav->{$key . '_url'} ?? '' }}">

                                                <div class="input-group-text">
                                                    <div class="form-check form-switch">
                                                                            {{-- 
                                                    Function 4: Conditional Attribute
                                                    This checks the boolean status from the database.
                                                    If `$topnav->facebook_status` is true, Blade adds the `checked` attribute to the input,
                                                    which turns the toggle switch to the "on" position.
                                                --}}
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="{{ $key }}_status"
                                                            name="{{ $key }}_status"
                                                            @if ($topnav->{$key . '_status'} ?? false) checked @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>



                        </div>

                        <!-- Submit Button -->
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>

                    </form>
                </div>
            </div>

        </div> <!-- container-xxl -->
    </div> <!-- content -->
@endsection
