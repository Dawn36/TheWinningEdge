@extends('layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Post-->
	<div class="post d-flex flex-column-fluid" id="kt_post">
		<!--begin::Container-->
		<div id="kt_content_container" class="container-xxl">
			<!--begin::Layout-->
			<div class="d-flex flex-column flex-lg-row">

				
				<!--begin::Sidebar-->
				<div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
					<!--begin::Card-->
					<div class="card mb-5 mb-xl-8">
						<!--begin::Card body-->
						<div class="card-body">
							<!--begin::Summary-->
							<!--begin::User Info-->
							<div class="d-flex flex-center flex-column py-5">
								<!--begin::Avatar-->
								<!-- <div class="symbol symbol-100px symbol-circle mb-7">
									<img src="assets/media/avatars/300-3.jpg" alt="image" />
								</div> -->
								<!--end::Avatar-->
								<!--begin::Name-->
								<div class="fw-bolder mt-5 fs-9">Company Name</div>
								<a class="fs-1 text-gray-800 text-hover-primary fw-bolder mb-3" style="text-align: center;">{{ucwords($company->company_name == '' ? 'Company name is not added' : $company->company_name)}} </a>
								<!--end::Name-->
								<!--begin::Position-->
								<div class="mb-9">
									<!--begin::Badge-->
									<div class="badge badge-lg badge-light-primary d-inline">Contact</div>
									<!--begin::Badge-->
								</div>
								<!--end::Position-->
							</div>
							<div class="d-flex flex-stack fs-4 py-3">
								<div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
									<span class="ms-2 rotate-180">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
										<span class="svg-icon svg-icon-3">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
								</div>
								<span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
									<button  class="btn btn-sm btn-light-primary" onclick="editContact('{{$contact->id}}')" >Edit</button>
								</span>
							</div>
							<!--end::Details toggle-->
							<div class="separator"></div>
							<!--begin::Details content-->
							<div id="kt_user_view_details" class="collapse show">
								<div class="pb-5 fs-6">
									<div class="fw-bolder mt-5">Contact Name</div>
									<div class="text-gray-600 text-hover-primary">{{ucwords($contact->first_name)}} {{ucwords($contact->last_name)}}</div>

									<div class="fw-bolder mt-5">Mobile phone</div>
									<div class="text-gray-600 text-hover-primary">{{ucwords($contact->mobile_phone)}}</div>

									<div class="fw-bolder mt-5">Email Address</div>
									<div class="text-gray-600 text-hover-primary"><a class=" text-gray-600 text-hover-primary mb-1" href="mailto:{{$contact->email}}"  onclick="getEmailObj('email','{{$contact->id}}',this)">{{$contact->email}}</a></div>

									<div class="fw-bolder mt-5">Contact Status</div>
                                    @php $status=explode('_',$contact->status) @endphp
									<div class="text-gray-600 text-hover-primary">{{ ucwords($status[0]) }} {{ count($status) == "2" ? ucwords($status[1] ) : '' }}</div>

									{{-- <div class="fw-bolder mt-5">Company Name</div>
									<div class="text-gray-600 text-hover-primary">{{ucwords($contact->company_name)}}</div> --}}

									<div class="fw-bolder mt-5">Job Title</div>
									<div class="text-gray-600 text-hover-primary">{{ucwords($contact->job)}}</div>
									
									<div class="fw-bolder mt-5">Direct Phone Number</div>
									<div class="text-gray-600 text-hover-primary">{{ucwords($contact->phone_number)}}</div>

									

									<div class="fw-bolder mt-5">LinkedIn Contact Profile URL</div>
									<div class="text-gray-600">
										<a href="{{$contact->linked_in_url}}" class="text-gray-600 text-hover-primary">{{$contact->linked_in_url}}</a>
									</div>
									<div class="fw-bolder mt-5">Creation Date</div>
									<div class="text-gray-600 text-hover-primary">{{Date("Y-m-d",strtotime($contact->created_at))}}</div>
								</div>
							</div>
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Sidebar-->

				<!--begin::Content-->
				<div class="flex-lg-row-fluid ms-lg-15">
					<div class="d-flex flex-center flex-column pb-3 pt-0">
						<a class="fs-3 text-gray-800 text-hover-primary fw-bolder">Generate Logs by clicking the buttons below</a>
					</div>
					<div class="d-flex flex-wrap flex-center fs-8 mb-10">
						<!--begin::Stats-->
						<a onclick="addContactCounter('phone_call','{{$contact->id}}',this)" style="cursor: pointer;">
							<div class="bg-light-primary bg-hover-light border border-gray-300 border-dashed rounded py-3 px-3 mb-3 text-center me-3">
								<div class="fs-5 fw-bolder text-gray-700">
									<span class="w-75px">{{count($phoneCall)}}</span>
									<span class="svg-icon svg-icon-3 svg-icon-success">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
											<rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
										</svg>
									</span>
								</div>
								<div class="fw-bold text-muted"># Of Phone Calls</div>
							</div>
						</a>
						<!--end::Stats-->
						<!--begin::Stats-->
						<a onclick="addContactCounter('live_conversation','{{$contact->id}}',this)" style="cursor: pointer;">
							<div class="bg-light-primary bg-hover-light border border-gray-300 border-dashed rounded py-3 px-3 mb-3 text-center me-3">
								<div class="fs-5 fw-bolder text-gray-700">
									<span class="w-50px">{{count($liveConversation)}}</span>
									<span class="svg-icon svg-icon-3 svg-icon-success">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
											<rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
										</svg>
									</span>
								</div>
								<div class="fw-bold text-muted"> # Of Live Conversations</div>
							</div>
						</a>
						<!--end::Stats-->
						<!--begin::Stats-->
						<a onclick="addContactCounter('voice_mail','{{$contact->id}}',this)" style="cursor: pointer;">
							<div class="bg-light-primary bg-hover-light border border-gray-300 border-dashed rounded py-3 px-3 mb-3 text-center me-3">
								<div class="fs-5 fw-bolder text-gray-700">
									<span class="w-50px">{{count($voiceMail)}}</span>
									<span class="svg-icon svg-icon-3 svg-icon-success">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
											<rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
										</svg>
									</span>
								</div>
								<div class="fw-bold text-muted"># Of Voicemails</div>
							</div>
						</a>
						<!--end::Stats-->
						<!--begin::Stats-->
						<a onclick="addContactCounter('email','{{$contact->id}}',this)" style="cursor: pointer;">
							<div class="bg-light-primary bg-hover-light border border-gray-300 border-dashed rounded py-3 px-3 mb-3 text-center me-3">
								<div class="fs-5 fw-bolder text-gray-700">
									<span class="w-50px">{{count($email)}}</span>
									<span class="svg-icon svg-icon-3 svg-icon-success">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
											<rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
										</svg>
									</span>
								</div>
								<div class="fw-bold text-muted"># Of Email</div>
							</div>
						</a>
						<!--end::Stats-->
						<!--begin::Stats-->
						<a onclick="addContactCounter('meeting','{{$contact->id}}',this)" style="cursor: pointer;">
							<div class="bg-light-primary bg-hover-light border border-gray-300 border-dashed rounded py-3 px-3 mb-3 text-center">
								<div class="fs-5 fw-bolder text-gray-700">
									<span class="w-50px">{{count($meeting)}}</span>
									<span class="svg-icon svg-icon-3 svg-icon-success">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.8" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
											<rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
										</svg>
									</span>
								</div>
								<div class="fw-bold text-muted"># Of Meetings</div>
							</div>
						</a>
						<!--end::Stats-->
					</div>

					<!--begin:::Tabs-->
					<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8 mt-5">
						<!--begin:::Tab item-->
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_notes_tab">Notes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_tasks">Tasks</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_phone_calls_logs">Phone Calls</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_live_conversation_logs">Live Conversations</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_voicemails_logs">Voicemails</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_emails_logs">Emails</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_meetings_logs">Meetings</a>
						</li>
						<!--end:::Tab item-->
					</ul>
					<!--end:::Tabs-->
					<!--begin:::Tab content-->
					<div class="tab-content" id="myTabContent">
						<!--begin:::Tab pane-->
						<div class="tab-pane fade show active" id="kt_user_view_notes_tab" role="tabpanel">
							<div class="card card-flush mb-6 mb-xl-9">
								<div class="card-header mt-6">
									<div class="card-title flex-column">
										<h2 class="mb-1">Client's Notes</h2>
										<div class="fs-6 fw-bold text-muted">Total {{count($note)}} Notes in backlog</div>
									</div>
									<div class="card-toolbar">
										<button type="button" class="btn btn-light-primary btn-sm" onclick="addContactNote('{{$contact->id}}')">
											<span class="svg-icon svg-icon-3">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z" fill="black" />
													<rect x="11" y="19" width="10" height="2" rx="1" transform="rotate(-90 11 19)" fill="black" />
													<rect x="7" y="13" width="10" height="2" rx="1" fill="black" />
													<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
												</svg>
											</span>
											Add Notes
										</button>
									</div>
								</div>
								<div class="card-body d-flex flex-column">
                                    @for($i=0 ; $i < count($note); $i++)
									<div class="d-flex align-items-center position-relative mb-7">
										<div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
										<div class="fw-bold ms-5">
                                            @php 
                                            if($note[$i]->status == 'open')
                                            {
                                                $class='info';
                                            }
                                            if($note[$i]->status == 'in process')
                                            {
                                                $class='success';
                                            }
                                            if($note[$i]->status == 'complete')
                                            {
                                                $class='primary';
                                            }
                                            @endphp 
											<a href="javascript:;" class="fs-5 fw-bolder text-dark text-hover-{{$class}}">{{ucwords($note[$i]->note)}}</a>
                                          
											<div class="badge badge-sm badge-light-{{$class}} d-inline">{{ucwords($note[$i]->status)}}</div>
											<div class="fs-7 text-muted">Created On
												<a href="javascript:;">{{Date("Y-m-d",strtotime($note[$i]->created_at))}}</a>
											</div>
											<div class="fs-7 text-muted">Added By
												<a href="javascript:;">{{ucwords($note[$i]->user_name)}}</a>
											</div>
										</div>
										<button type="button" class="btn btn-icon btn-active-light-{{$class}} w-30px h-30px ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											<span class="svg-icon svg-icon-3">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
													<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
												</svg>
											</span>
										</button>
										<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
											<div class="px-7 py-5">
												<div class="fs-5 text-dark fw-bolder">Update Status</div>
											</div>
											<div class="separator border-gray-200"></div>
											<form class="form px-7 py-5" method="POST" action="{{ route('contact_change_status') }}" data-kt-menu-id="kt-users-tasks-form">
                                                @csrf
                                                <input hidden name='note_id' value="{{$note[$i]->id}}"/>
												<div class="fv-row mb-10">
													<label class="form-label fs-6 fw-bold">Status:</label>
													<select class="form-select form-select-solid" name="task_status" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-hide-search="true">
														<option></option>
														<option value="open" {{$note[$i]->status == 'open' ? "Selected" : ''}}>Open</option>
														<option value="in process" {{$note[$i]->status == 'in process' ? "Selected" : ''}}>In Process</option>
														<option value="complete" {{$note[$i]->status == 'complete' ? "Selected" : ''}}>Completed</option>
													</select>
												</div>
												<div class="d-flex justify-content-end">
													<button type="submit" class="btn btn-sm btn-primary">Apply</button>
												</div>
											</form>
										</div>
									</div>
                                    @endfor

								</div>
							</div>
						</div>
						<!--end:::Tab pane-->
						<!--begin:::Tab pane-->
						<div class="tab-pane fade " id="kt_tasks" role="tabpanel">
							<div class="card card-flush mb-6 mb-xl-9">
								<div class="card-header mt-6">
									<div class="card-title flex-column">
										<h2 class="mb-1">Client's Tasks</h2>
										<div class="fs-6 fw-bold text-muted">Total {{count($task)}} Tasks in backlog</div>
									</div>
									<div class="card-toolbar">
										<button type="button" class="btn btn-light-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_add_tasks" onclick="addTaskContact('{{$contact->id}}')">
											<span class="svg-icon svg-icon-3">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z" fill="black" />
													<rect x="11" y="19" width="10" height="2" rx="1" transform="rotate(-90 11 19)" fill="black" />
													<rect x="7" y="13" width="10" height="2" rx="1" fill="black" />
													<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
												</svg>
											</span>
											Add Tasks
										</button>
									</div>
								</div>
								<div class="card-body d-flex flex-column">
									<table class="kt_datatable_example_1 table table-row-bordered gy-5">
										<thead>
											<tr class="fw-bold fs-6 text-muted">
												<th>Task ID</th>
												<th class="min-w-200px">Task</th>
												<th>Status</th>
												<th>Date Assigned</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody class="fw-bold text-gray-600">
											@for ($i = 0; $i < count($task); $i++) @php $a=$i; $a++; @endphp 
											<tr>
												<td>{{$a}}</td>
												<td>{{ucwords($task[$i]->description)}}</td>
												<td>
													<div class="badge badge-sm badge-light-info d-inline">{{ucwords($task[$i]->task_status)}}</div>
												</td>
												<td>{{$task[$i]->task_date}}</td>
												<td>
													<button  class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary"  data-bs-original-title="Edit Client" onclick="editTaskContact('{{$task[$i]->id}}','{{$contact->id}}')">
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
																<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
															</svg>
														</span>
													</button>
													<form  style="display: inline-block" method="POST" action="{{ route('task.destroy', $task[$i]->id) }}">
														@method('DELETE')
														@csrf
													<button type="submit" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-original-title="Delete">
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
																<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
																<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
															</svg>
														</span>
													</button>
													</form>
												</td>
											</tr>
										</tbody>
										@endfor
									</table>
								</div>
							</div>
						</div>
						<!--end:::Tab pane-->
						<!--begin:::Tab pane-->
						<div class="tab-pane fade " id="kt_phone_calls_logs" role="tabpanel">
							<div class="card card-flush mb-6 mb-xl-9">
								<div class="card-header mt-6">
									<div class="card-title flex-column">
										<h2 class="mb-1"># of Phone Calls</h2>
										<div class="fs-6 fw-bold text-muted">Total {{count($phoneCall)}} Phone Calls in backlog</div>
									</div>
								</div>
								<div class="card-body d-flex flex-column">
									<table class="kt_datatable_example_1 table table-row-bordered gy-5">
										<thead>
											<tr class="fw-bold fs-6 text-muted">
												<th># Of Phone Calls</th>
												<th>Creation Date</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody class="fw-bold text-gray-600">
                                            @for ($i = 0; $i < count($phoneCall); $i++) @php $a=$i; $a++; @endphp 
											<tr>
												<td>{{$a}}</td>
												<td>{{Date("Y-m-d h:i:s A",strtotime($phoneCall[$i]->created_at))}}</td>
												<td>
													<a href="{{route('contact_counter_delete',$phoneCall[$i]->id)}}" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-original-title="Delete Phone Call">
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
																<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
																<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
															</svg>
														</span>
													</a>
												</td>
											</tr>
                                            @endfor
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!--end:::Tab pane-->
						<!--begin:::Tab pane-->
						<div class="tab-pane fade " id="kt_live_conversation_logs" role="tabpanel">
							<div class="card card-flush mb-6 mb-xl-9">
								<div class="card-header mt-6">
									<div class="card-title flex-column">
										<h2 class="mb-1"># of Live Conversations</h2>
										<div class="fs-6 fw-bold text-muted">Total {{count($liveConversation)}} Live Conversations in backlog</div>
									</div>
								</div>
								<div class="card-body d-flex flex-column">
									<table class="kt_datatable_example_1 table table-row-bordered gy-5">
										<thead>
											<tr class="fw-bold fs-6 text-muted">
												<th># Of Live Conversations</th>
												<th>Creation Date</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody class="fw-bold text-gray-600">
											@for ($i = 0; $i < count($liveConversation); $i++) @php $a=$i; $a++; @endphp 
											<tr>
												<td>{{$a}}</td>
												<td>{{Date("Y-m-d h:i:s A",strtotime($liveConversation[$i]->created_at))}}</td>
												<td>
													<a href="{{route('contact_counter_delete',$liveConversation[$i]->id)}}" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-original-title="Delete Live Conversation">
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
																<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
																<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
															</svg>
														</span>
													</a>
												</td>
											</tr>
                                            @endfor
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!--end:::Tab pane-->
						<!--begin:::Tab pane-->
						<div class="tab-pane fade " id="kt_voicemails_logs" role="tabpanel">
							<div class="card card-flush mb-6 mb-xl-9">
								<div class="card-header mt-6">
									<div class="card-title flex-column">
										<h2 class="mb-1"># of Voicemails</h2>
										<div class="fs-6 fw-bold text-muted">Total {{count($voiceMail)}} Voicemails in backlog</div>
									</div>
								</div>
								<div class="card-body d-flex flex-column">
									<table class="kt_datatable_example_1 table table-row-bordered gy-5">
										<thead>
											<tr class="fw-bold fs-6 text-muted">
												<th># Of Voicemails</th>
												<th>Creation Date</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody class="fw-bold text-gray-600">
											@for ($i = 0; $i < count($voiceMail); $i++) @php $a=$i; $a++; @endphp 
											<tr>
												<td>{{$a}}</td>
												<td>{{Date("Y-m-d h:i:s A",strtotime($voiceMail[$i]->created_at))}}</td>
												<td>
													<a href="{{route('contact_counter_delete',$voiceMail[$i]->id)}}" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-original-title="Delete Voice Mail">
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
																<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
																<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
															</svg>
														</span>
													</a>
												</td>
											</tr>
                                            @endfor
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!--end:::Tab pane-->
						<!--begin:::Tab pane-->
						<div class="tab-pane fade " id="kt_emails_logs" role="tabpanel">
							<div class="card card-flush mb-6 mb-xl-9">
								<div class="card-header mt-6">
									<div class="card-title flex-column">
										<h2 class="mb-1"># of Emails</h2>
										<div class="fs-6 fw-bold text-muted">Total {{count($email)}} Emails in backlog</div>
									</div>
								</div>
								<div class="card-body d-flex flex-column">
									<table class="kt_datatable_example_1 table table-row-bordered gy-5">
										<thead>
											<tr class="fw-bold fs-6 text-muted">
												<th># Of Emails</th>
												<th>Creation Date</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody class="fw-bold text-gray-600">
											@for ($i = 0; $i < count($email); $i++) @php $a=$i; $a++; @endphp 
											<tr>
												<td>{{$a}}</td>
												<td>{{Date("Y-m-d h:i:s A",strtotime($email[$i]->created_at))}}</td>
												<td>
													<a href="{{route('contact_counter_delete',$email[$i]->id)}}" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-original-title="Delete Email">
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
																<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
																<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
															</svg>
														</span>
													</a>
												</td>
											</tr>
                                            @endfor
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!--end:::Tab pane-->
						<!--begin:::Tab pane-->
						<div class="tab-pane fade " id="kt_meetings_logs" role="tabpanel">
							<div class="card card-flush mb-6 mb-xl-9">
								<div class="card-header mt-6">
									<div class="card-title flex-column">
										<h2 class="mb-1"># of Meetings</h2>
										<div class="fs-6 fw-bold text-muted">Total {{count($meeting)}} Meetings in backlog</div>
									</div>
								</div>
								<div class="card-body d-flex flex-column">
									<table class="kt_datatable_example_1 table table-row-bordered gy-5">
										<thead>
											<tr class="fw-bold fs-6 text-muted">
												<th># Of Meetings</th>
												<th>Creation Date</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody class="fw-bold text-gray-600">
											@for ($i = 0; $i < count($meeting); $i++) @php $a=$i; $a++; @endphp 
											<tr>
												<td>{{$a}}</td>
												<td>{{Date("Y-m-d h:i:s A",strtotime($meeting[$i]->created_at))}}</td>
												<td>
													<a href="{{route('contact_counter_delete',$meeting[$i]->id)}}" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-original-title="Delete Meeting">
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
																<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
																<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
															</svg>
														</span>
													</a>
												</td>
											</tr>
                                            @endfor
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!--end:::Tab pane-->
					</div>
					<!--end:::Tab content-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Layout-->

			<!--end::Modals-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>


<script type="text/javascript">



	function editTaskContact(id,contactsId) {
    var value = {
            contacts_id:contactsId,
            id:id
        };
		url = "{{route('contact_task_edit')}}";
        $.ajax({
            type: 'GET',
			data: value,
            url: url,
            success: function(result) {
                $('#myModalLgHeading').html('Edit Task');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }

 
 function addContactNote(contactId) {
        var value={
            contactId:contactId
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('contact_note') }}",
            data: value,
            success: function(result) {
                $('#myModalLgHeading').html('Add a Note');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }
	
    function editContact(id) {
        url = "{{route('contact.edit',':id')}}";
        url = url.replace(':id', id);
        $.ajax({
            type: 'GET',
            url: url,
            success: function(result) {
                $('#myModalLgHeading').html('Edit Contact');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }
	function getEmailObj(status,contactsId,obj)
	{
		obj=obj.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.children[1].children[1].children[3];
		addContactCounter(status,contactsId,obj) 
	}
    function addContactCounter(status,contactsId,obj) {
        var value = {
            status: status,
            contacts_id:contactsId
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('contact_counter') }}",
            data: value,
            success: function(result) {
				value=obj.children[0].children[0].children[0].textContent;
                value++;
                obj.children[0].children[0].children[0].textContent=value;
                // const d = new Date();
                // month=d.getMonth() + 1;
                // obj.children[0].children[1].textContent=d.getFullYear()+"-"+month+"-"+d.getDate()+" "+" "+formatAMPM(new Date);
                // $('#myModalLgHeading').html('Add Contact');
                // $('#modalBodyLarge').html(result);
                // $('#myModalLg').modal('show');
            }
        });
    }
	function closeModal()
    {
        window.location.reload();
        // $('#myModalLg').modal('hide');
    }

</script>
@endsection('content')