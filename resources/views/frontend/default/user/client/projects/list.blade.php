@extends('frontend.default.layouts.app')

@section('content')

    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-start">
                @include('frontend.default.user.client.inc.sidebar')

                <div class="aiz-user-panel">
                    <div class="aiz-titlebar mt-2 mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h1 class="h3">{{ translate('All Projects') }}</h1>
							</div>
							
							<div class="col-md-6 text-md-right">
								@if ($email_verified_at== true)
								<a href="{{Request::root()}}/Terms-Conditions-Project" class="btn btn-primary">
									<i class="las la-plus"></i>
									<span>{{ translate('Add New Project') }}</span>
								</a>
								@endif
							</div>
                        </div>
                    </div>
                    <div class="">
                        @forelse ($projects as $key => $project)
							<div class="card project-card">
								<div class="card-header border-bottom-0">
									<div>
										<span class="badge badge-primary badge-inline badge-md">{{ single_price($project->price) }}</span>
									</div>
									<div>
										@if ($project->cancel_status == 1)
											<span class="badge badge-danger badge-inline badge-md">{{ translate('Cancelled') }}</span>
										@elseif ($project->closed == 1)
											<span class="badge badge-success badge-inline badge-md">{{ translate('Completed') }}</span>
										@elseif ($project->private == 1)
											<span class="badge badge-warning badge-inline badge-md">{{ translate('Private') }}</span>
										@elseif ($project->biddable == 0)
											<span class="badge badge-info badge-inline badge-md">{{ translate('Running') }}</span>
										@else
											<span class="badge badge-primary badge-inline badge-md">{{ translate('Open') }}</span>
										@endif
									</div>
								</div>

								<div class="card-body pt-1">
									<h5 class="h6 fw-600 lh-1-5">
										<a href="{{ route('project.details', $project->slug) }}" class="text-inherit" target="_blank">{{ $project->name }}</a>
									</h5>
									<ul class="list-inline opacity-70 fs-12">
										<li class="list-inline-item">
											<i class="las la-clock opacity-40"></i>
											<span>{{ Carbon\Carbon::parse($project->created_at)->diffForHumans() }}</span>
										</li>
										<li class="list-inline-item">
											<a href="" target="_blank" class="text-inherit">
												<i class="las la-stream opacity-40"></i>
												<span>@if ($project->project_category != null) {{ $project->project_category->name }} @else {{ translate('Removed Category') }} @endif</span>
											</a>
										</li>
										<li class="list-inline-item">
											<i class="las la-handshake"></i>
											<span>{{ $project->type }}</span>
										</li>
									</ul>
									<div class="text-muted lh-1-8">
										<p>{{ $project->excerpt }}</p>
									</div>
									<div>
									    
                                        @foreach (json_decode($project->skills) as $key => $skill_id)
                                            @php
                                                $skill = \App\Models\Skill::find($skill_id);
                                            @endphp
                                            @if ($skill != null)
                                                <span class="btn btn-light btn-xs mb-1">{{ $skill->name }}</span>
                                            @endif
                                        @endforeach
									</div>
								</div>
                                <div class="card-footer">
                                	@if ($project->cancel_status == 1)
                                		@if($project->private == 1)
                                			<a href="{{ route('freelancer.details', $project->hire_invitation->freelancer->user_name) }}" target="_blank" class="d-flex mr-3 align-items-center text-inherit" tabindex="0">
			                                    <span class="avatar avatar-xs">
	                                                @if($project->hire_invitation->freelancer->photo != null)
	                                                    <img src="{{ custom_asset($project->hire_invitation->freelancer->photo) }}">
	                                                @else
	                                                    <img src="{{ my_asset('assets/frontend/default/img/avatar-place.png') }}">
	                                                @endif
			                                    </span>
			                                    <div class="pl-2">
			                                    	<h4 class="h6 mb-0 fs-14">{{ $project->hire_invitation->freelancer->name }}</h4>
	                                                <div class="">
	    												<span class="bg-rating rounded text-white px-1 mr-1 fs-10">
	                                                        {{ getAverageRating($project->hire_invitation->freelancer->id) }}
	    												</span>
	    												<span class="opacity-50">
	    													({{ getNumberOfReview($project->hire_invitation->freelancer->id) }} {{ translate('Reviews') }})
	    												</span>
	    											</div>
			                                    </div>
			                                </a>
                                		@else
	                                		<div class="d-flex align-items-center">
												<ul class="d-flex list-inline mb-0">
													<li>
						                                <span class="small text-secondary">{{ translate('Total Bids') }}</span>
		                                                @if ($project->bids > 0)
		                                                    <h4 class="mb-0 h6 fs-13">{{ $project->bids }} +</h4>
		                                                @else
		                                                    <h4 class="mb-0 h6 fs-13">{{ $project->bids }}</h4>
		                                                @endif
													</li>
												</ul>
											</div>
										@endif
	                                    <span class="badge badge-inline badge-soft-secondary">
	                                        {{ translate('Cancelled By') }}
	                                        @if ($project->cancel_by_user != null)
	                                            {{ $project->cancel_by_user->name }}
	                                        @endif
	                                    </span>
                                	@elseif ($project->closed == 1)
	                                	<div class="d-flex align-items-center">
	                                	      @if(!empty($project->project_user->user->user_name))
                  
                
											<a href="{{ route('freelancer.details', $project->project_user->user->user_name) }}" target="_blank" class="d-flex mr-3 align-items-center text-inherit" tabindex="0">
											                 @endif
			                                    <span class="avatar avatar-xs">
			                                          @if(!empty($project->project_user->user->photo))
                  
             
	                                                @if($project->project_user->user->photo != null)
	                                                    <img src="{{ custom_asset($project->project_user->user->photo) }}">
	                                                @else
	                                                    <img src="{{ my_asset('assets/frontend/default/img/avatar-place.png') }}">
	                                                @endif
	                                                                @endif
			                                    </span>
			                                    <div class="pl-2">
			                                         @if(!empty($project->project_user->user->name))
			                                    	<h4 class="h6 mb-0 fs-14">{{ $project->project_user->user->name }}</h4>
			                                    	 
                  
                             @endif
	                                                <div class="">
	                                                         @if(!empty($project->project_user->user->name))
	    												<span class="bg-rating rounded text-white px-1 mr-1 fs-10">
	                                                        {{ getAverageRating($project->project_user->user_id) }}
	    												</span>
	    												@endif
	    												    @if(!empty($project->project_user->user->name))
	    												<span class="opacity-50">
	    													({{ getNumberOfReview($project->project_user->user_id) }} {{ translate('Reviews') }})
	    												</span>
	    													@endif
	    											</div>
			                                    </div>
			                                </a>
			                                  @if(!empty($project->project_user->user->name))
			                                <span class="border-left ml-2 pl-2">
                                                <h4 class="mb-0 h6 fs-13">{{ single_price($project->project_user->hired_at) }}</h4>
                                                <span class="small text-secondary">{{ translate('Hired At') }}</span>
                                            </span>
                                            	@endif
										</div>
	                                    @if (\App\Models\Review::where('project_id', $project->id)->where('reviewer_user_id', Auth::user()->id)->first() == null)
	                                        <button type="button" onclick="showRatingModal({{ $project->id }})" class="btn btn-secondary btn-sm fw-500">Rate This Freelancer</button>
	                                    @else
	                                        <span class="badge badge-inline badge-soft-secondary">{{ translate('You Already rated this client') }}</span>
	                                    @endif
									@elseif($project->private == 1)
	                                    <a href="{{ route('freelancer.details', $project->hire_invitation->freelancer->user_name) }}" target="_blank" class="d-flex mr-3 align-items-center text-inherit" tabindex="0">
		                                    <span class="avatar avatar-xs">
                                                @if($project->hire_invitation->freelancer->photo != null)
                                                    <img src="{{ custom_asset($project->hire_invitation->freelancer->photo) }}">
                                                @else
                                                    <img src="{{ my_asset('assets/frontend/default/img/avatar-place.png') }}">
                                                @endif
		                                    </span>
		                                    <div class="pl-2">
		                                    	<h4 class="h6 mb-0 fs-14">{{ $project->hire_invitation->freelancer->name }}</h4>
                                                <div class="">
    												<span class="bg-rating rounded text-white px-1 mr-1 fs-10">
                                                        {{ getAverageRating($project->hire_invitation->freelancer->id) }}
    												</span>
    												<span class="opacity-50">
    													({{ getNumberOfReview($project->hire_invitation->freelancer->id) }} {{ translate('Reviews') }})
    												</span>
    											</div>
		                                    </div>
		                                </a>
										<div>
											<a href="javascript:void(0)" class="btn btn-secondary btn-sm fw-500 confirm-cancel" data-href="{{route('projects.cancel', $project->id)}}">{{ translate('Cancel') }}</a>
	                                        @if($project->hire_invitation->status == 'pending')
	                                        	<a href="{{ route('projects.edit',encrypt($project->id)) }}" class="btn btn-primary btn-sm fw-500">{{ translate('Edit') }}</a>
	                                        @else
	                                        	<a href="javascript:void(0)" class="btn btn-primary btn-sm fw-500 confirm-complete" data-href="{{route('projects.my_completed_project', $project->id)}}">{{ translate('Complete This') }}</a>
	                                        @endif
										</div>
									@elseif ($project->biddable == 0)
									  @if(!empty( $project->project_user->user->user_name))
                  
                           
										<a href="{{ route('freelancer.details', $project->project_user->user->user_name) }}" target="_blank" class="d-flex mr-3 align-items-center text-inherit" tabindex="0">
										      @endif
										    
		                                    <span class="avatar avatar-xs">
		                                          @if(!empty($project->project_user->user->photo))
                                                @if($project->project_user->user->photo != null)
                                                    <img src="{{ custom_asset($project->project_user->user->photo) }}">
                                                @else
                                                    <img src="{{ my_asset('assets/frontend/default/img/avatar-place.png') }}">
                                                @endif
                                                          @endif
		                                    </span>
		                                    <div class="pl-2">
		                                          @if(!empty($project->project_user->user->name ))
                  
                           
		                                    	<h4 class="h6 mb-0 fs-14">{{ $project->project_user->user->name }}</h4>
		                                    	  @endif
                                                <div class="">
                                                      @if(!empty($project->project_user->user->id))
                  
                            
                                                     @if(!empty($project->project_user->user->id))
    												<span class="bg-rating rounded text-white px-1 mr-1 fs-10">
                                                        {{ getAverageRating($project->project_user->user->id) }}
    												</span>
    												         @endif
    												<span class="opacity-50">
    													({{ getNumberOfReview($project->project_user->user->id) }} {{ translate('Reviews') }})
    												</span>
    												 @endif
    											</div>
		                                    </div>
		                                </a>
										<div>
											<a href="javascript:void(0)" class="btn btn-secondary btn-sm fw-500 confirm-cancel" data-href="{{route('projects.my_cancelled_project', $project->id)}}">{{ translate('Cancel') }}</a>
	                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm fw-500 confirm-complete" data-href="{{route('projects.my_completed_project', $project->id)}}">{{ translate('Complete This') }}</a>
										</div>
									@else
										<div class="d-flex align-items-center">
											<ul class="d-flex list-inline mb-0">
												<li>
					                                <span class="small text-secondary">{{ translate('Total Bids') }}</span>
	                                                @if ($project->bids > 0)
	                                                    <h4 class="mb-0 h6 fs-13">{{ $project->bids }} +</h4>
	                                                @else
	                                                    <h4 class="mb-0 h6 fs-13">{{ $project->bids }}</h4>
	                                                @endif
												</li>
											</ul>
										</div>
										<div>
											<a href="javascript:void(0)" class="btn btn-secondary btn-sm fw-500 confirm-cancel" data-href="{{route('projects.cancel', $project->id)}}">{{ translate('Cancel') }}</a>
	                                        <a href="{{ route('projects.edit',encrypt($project->id)) }}" class="btn btn-secondary btn-sm fw-500">{{ translate('Edit') }}</a>
	                                        <a href="{{ route('project.bids', $project->slug) }}" class="btn btn-primary btn-sm fw-500">{{translate('See All Bidders')}}</a>
											@php
											$projects_ = DB::table('projects')->where('id', $project->id)->value('project_approval');
			
											@endphp
											@if ($projects_==0)
											<a href="#" class="btn btn-warning btn-sm fw-500">????????</a>
											@else
											<a href="#"  style="
											display: none;
										" class="btn btn-success btn-sm fw-500">??????????</a>	
											@endif


										</div>
									@endif
								</div>
							</div>
                        @empty
                            <div class="card">
                                <div class="card-body text-center">
                                    <i class="las la-frown la-4x mb-4 opacity-40"></i>
                                    <h4>{{ translate('Nothing Found') }}</h4>
                                </div>
                            </div>
                        @endforelse
					</div>
					<div class="aiz-pagination aiz-pagination-center">
	                    {{ $projects->links() }}
	                </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('modal')
    @include('frontend.default.partials.cancel_modal')
    @include('frontend.default.partials.complete_modal')
@endsection
