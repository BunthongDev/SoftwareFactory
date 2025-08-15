@extends('admin.master')
@section('admin')
    {{-- jQuery is required for the image preview and repeater scripts --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="content">
        <div class="container-xxl">
            <div class="py-3">
                <h4 class="fs-18 fw-semibold m-0">Manage About Us Page</h4>
            </div>

            <form action="{{ route('about-us.update') }}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- Main Page Content Section --}}
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Main Page Content</h5>
                    </div>
                    <div class="card-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Hero Title</label>
                            <input type="text" name="hero_title" class="form-control" value="{{ $page->hero_title }}" placeholder="About Anajak Software" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Hero Description - optional </label>
                            <textarea name="hero_description" class="form-control" rows="3" placeholder="Your description">{{ $page->hero_description }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Hero Image 1 - optional </label>
                            <input type="file" name="hero_image1" class="form-control" id="hero_image1_input">
                            <img src="{{ asset($page->hero_image1) }}" id="hero_image1_preview" class="mt-2"
                                style="max-width: 200px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Hero Image 2 - optional </label>
                            <input type="file" name="hero_image2" class="form-control" id="hero_image2_input">
                            <img src="{{ asset($page->hero_image2) }}" id="hero_image2_preview" class="mt-2"
                                style="max-width: 200px;">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Statistic 1 Number - optional </label>
                            <input type="text" name="stat1_number" class="form-control"
                                value="{{ $page->stat1_number }}" placeholder="150+">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Statistic 1 Label - optional </label>
                            <input type="text" name="stat1_label" class="form-control" value="{{ $page->stat1_label }}" placeholder="Project Done">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Statistic 2 Number - optional </label>
                            <input type="text" name="stat2_number" class="form-control"
                                value="{{ $page->stat2_number }}" placeholder="99%">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Statistic 2 Label - optional </label>
                            <input type="text" name="stat2_label" class="form-control" value="{{ $page->stat2_label }}" placeholder="Happy Client">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Journey Title - optional </label>
                            <input type="text" name="journey_title" class="form-control"
                                value="{{ $page->journey_title }}" placeholder="Our Journey">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Journey Description - optional </label>
                            <textarea name="journey_description" class="form-control" rows="2" placeholder="How we start from the begining to present">{{ $page->journey_description }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Team Title - optional </label>
                            <input type="text" name="team_title" class="form-control" value="{{ $page->team_title }}" placeholder="Meet Our Team">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Team Description - optional </label>
                            <textarea name="team_description" class="form-control" rows="2" placeholder="We are experting in developing software">{{ $page->team_description }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Team Members Section --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Team Members</h5>
                        <button type="button" class="btn btn-success btn-sm" id="add-team-member">Add Member</button>
                    </div>
                    <div class="card-body m-2" id="team-members-container">
                        @foreach ($teamMembers as $member)
                            <div class="row g-3 mb-3 border p-3 rounded position-relative team-member-row">
                                <input type="hidden" name="team[{{ $member->id }}][id]" value="{{ $member->id }}">
                                <div class="col-md-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="team[{{ $member->id }}][name]" class="form-control"
                                        value="{{ $member->name }}" placeholder="Rorn Bunthong" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Role - optional</label>
                                    <input type="text" name="team[{{ $member->id }}][role]" class="form-control"
                                        value="{{ $member->role }}" placeholder="Co-Founder, CTO">
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">Order </label>
                                    <input type="number" name="team[{{ $member->id }}][order]" class="form-control"
                                        value="{{ $member->order }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Avatar - optional</label>
                                    <input type="file" name="team[{{ $member->id }}][avatar]" class="form-control">
                                    <img src="{{ asset($member->avatar) }}" class="mt-2" style="max-width: 100px;">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Facebook URL - optional</label>
                                    <input type="url" name="team[{{ $member->id }}][facebook_url]"
                                        class="form-control" value="{{ $member->facebook_url }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Twitter URL - optional</label>
                                    <input type="url" name="team[{{ $member->id }}][twitter_url]"
                                        class="form-control" value="{{ $member->twitter_url }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">LinkedIn URL - optional</label>
                                    <input type="url" name="team[{{ $member->id }}][linkedin_url]"
                                        class="form-control" value="{{ $member->linkedin_url }}">
                                </div>
                                <div class="position-absolute top-0 end-0 p-2">
                                    <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
                                    <input type="hidden" name="team[{{ $member->id }}][delete]" class="delete-flag"
                                        value="0">
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Timeline Events Section --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Timeline Events</h5>
                        <button type="button" class="btn btn-success btn-sm" id="add-timeline-event">Add Event</button>
                    </div>
                    <div class="card-body" id="timeline-events-container">
                        @foreach ($timelineEvents as $event)
                            <div class="row g-3 mb-3 border p-3 rounded position-relative timeline-event-row">
                                <input type="hidden" name="timeline[{{ $event->id }}][id]"
                                    value="{{ $event->id }}">
                                <div class="col-md-2">
                                    <label class="form-label">Year</label>
                                    <input type="text" name="timeline[{{ $event->id }}][year]"
                                        class="form-control" value="{{ $event->year }}" placeholder="2025" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Event Title</label>
                                    <input type="text" name="timeline[{{ $event->id }}][event]"
                                        class="form-control" value="{{ $event->event }}" placeholder="Company Founded">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Description - optional</label>
                                    <input type="text" name="timeline[{{ $event->id }}][description]"
                                        class="form-control" value="{{ $event->description }}" placeholder="Our services went global, reaching cutomers and partner around the world">
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">Order</label>
                                    <input type="number" name="timeline[{{ $event->id }}][order]"
                                        class="form-control" value="{{ $event->order }}">
                                </div>
                                <div class="position-absolute top-0 end-0 p-2">
                                    <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
                                    <input type="hidden" name="timeline[{{ $event->id }}][delete]"
                                        class="delete-flag" value="0">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save All Changes</button>
                </div>
            </form>
        </div>
    </div>


    {{-- Templates for new rows --}}
    <div id="team-member-template" style="display: none;">
        <div class="row g-3 mb-3 border p-3 rounded position-relative team-member-row">
            <div class="col-md-3">
                <label class="form-label">Name</label>
                <input type="text" name="team[new_0][name]" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Role</label>
                <input type="text" name="team[new_0][role]" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="form-label">Order</label>
                <input type="number" name="team[new_0][order]" class="form-control" value="0">
            </div>
            <div class="col-md-4">
                <label class="form-label">Avatar</label>
                {{-- The class "avatar-input" is important for the script --}}
                <input type="file" name="team[new_0][avatar]" class="form-control avatar-input">
                {{-- ADDED: Image tag for the preview --}}
                <img src="{{ url('upload/no_image.jpg') }}" class="mt-2 avatar-preview" style="max-width: 100px;">
            </div>
            <div class="col-md-4">
                <label class="form-label">Facebook URL</label>
                <input type="url" name="team[new_0][facebook_url]" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Twitter URL</label>
                <input type="url" name="team[new_0][twitter_url]" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">LinkedIn URL</label>
                <input type="url" name="team[new_0][linkedin_url]" class="form-control">
            </div>
            <div class="position-absolute top-0 end-0 p-2">
                <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
                <input type="hidden" name="team[new_0][delete]" class="delete-flag" value="0">
            </div>
        </div>
    </div>

    <div id="timeline-event-template" style="display: none;">
        <div class="row g-3 mb-3 border p-3 rounded position-relative timeline-event-row">
            <div class="col-md-2">
                <label class="form-label">Year</label>
                <input type="text" name="timeline[new_0][year]" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Event Title</label>
                <input type="text" name="timeline[new_0][event]" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Description</label>
                <input type="text" name="timeline[new_0][description]" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="form-label">Order</label>
                <input type="number" name="timeline[new_0][order]" class="form-control" value="0">
            </div>
            <div class="position-absolute top-0 end-0 p-2">
                <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
                <input type="hidden" name="timeline[new_0][delete]" class="delete-flag" value="0">
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            // Image previews for existing fields
            $('#hero_image1_input').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#hero_image1_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
            $('#hero_image2_input').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#hero_image2_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });

            // Repeater for Team Members
            let teamIndex = 0;
            $('#add-team-member').click(function() {
                let template = $('#team-member-template').html().replace(/new_0/g, 'new_' + teamIndex);
                $('#team-members-container').append(template);
                teamIndex++;
            });

            // Repeater for Timeline Events
            let timelineIndex = 0;
            $('#add-timeline-event').click(function() {
                let template = $('#timeline-event-template').html().replace(/new_0/g, 'new_' +
                    timelineIndex);
                $('#timeline-events-container').append(template);
                timelineIndex++;
            });

            // Logic to "soft delete" a row
            $(document).on('click', '.remove-row', function() {
                let row = $(this).closest('.row');
                row.find('.delete-flag').val('1');
                row.hide();
            });

            // Logic for image preview on new team member rows
            $(document).on('change', '.avatar-input', function(e) {
                let preview = $(this).siblings('.avatar-preview');
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
