<form class="row" action="/ajax/item" method="post">
    {{ csrf_field() }}
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Component Name</label>
            <input type="text" class="form-control" name="name" id="name">
            <i class="form-group__bar"></i>
        </div>

        <div class="form-group">
            <label for="name_dari">اسم بخش</label>
            <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
            <i class="form-group__bar"></i>
        </div>
        @php
            $projects = \App\Project::pluck('name', 'id')->toArray();
        @endphp
        <div class="form-group">
            {{ Form::label('project_id', 'Project') }}
            {{ Form::select('project_id', $projects, null, ['class' => 'form-control', 'placeholder' => 'Select a Project']) }}
        </div>
        <input type="hidden" name="model" value="Component">

        <div class="clearfix"></div>
    </div>


</form>