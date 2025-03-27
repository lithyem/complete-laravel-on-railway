<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Quickstart - Basic</title>

        <!-- CSS And JavaScript -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        
	
		<div class="container">
			<h1>Laravel Quickstart - Basic</h1>
			<a href="{{route('profile.logout')}}">Logout</></a>
			<hr>

			<!-- Current Tasks -->
			<h2>Current Tasks / {{auth()->user()->name}}</h2>

			@if (count($tasks) > 0)
				<table class="table table-striped task-table">
					<thead>
						<th>Task</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</thead>
					<tbody>
						@foreach ($tasks as $task)
							<tr>
								<!-- Task Name -->
								<td class="table-text">
									<div>{{ $task->title }}</div>
								</td>
								<!-- Task description -->
								<td class="table-text">
									<div>{{ $task->description }}</div>
								</td>
								<!-- Task user name -->
								<td class="table-text">
									<div>{{ $task->user->name ?? "No user" }}</div>
								</td>
								<!-- Delete Button -->
								<td>
									<form action="/tasksdelete/{{ $task->id }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}

										<button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
											<span class="glyphicon glyphicon-trash"></span> Delete Task
										</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<div class="alert alert-info">
					There are no tasks!
				</div>
			@endif
			<!-- New Task Form -->
			<h2>Add New Task</h2>
			<!-- If there are creation errors, they will show here -->
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<!-- New Task Form -->
			<form action="/tasksadd" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				<div class="form-group">
					<div class="col-sm-6">
						<label for="task" class="col-sm-3 control-label">Title</label>
						<input type="text" name="title" id="task-name" class="form-control">
					</div>
					<div class="col-sm-6">
						<label for="task" class="col-sm-3 control-label">Description</label>
						<input type="text" name="description" id="task-description" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" id="add-task" class="btn btn-primary">
							<i class="fa fa-plus"></i> Add Task
						</button>
					</div>
				</div>
			</form>

	
	
	
		</div>
		<!-- JavaScript -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-+o3q5h4g
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-+o3q5h4g6e7
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-+o3q5h4g6e7" crossorigin="anonymous"></script>



    </body>
</html>