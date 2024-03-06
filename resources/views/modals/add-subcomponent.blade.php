<form class="row" action="/ajax/item" method="post">
    {{ csrf_field() }}
    @php
         $components = \App\Component::pluck('name', 'id')->toArray();
    @endphp
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Subcomponent Name</label>
            <input type="text" class="form-control" name="name" id="name">
            <i class="form-group__bar"></i>
        </div>

        <div class="form-group">
            <label for="name_dari">اسم بخش</label>
            <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
            <i class="form-group__bar"></i>
        </div>

        <div class="row">
            <div class="form-group col-12">
                {{ Form::label('component_id', 'Choose Component') }}
                {{ Form::select('component_id', $components, null, ['class' => 'form-control']) }}
            </div>

        </div>
        <input type="hidden" name="model" value="SubComponent">
        <div class="clearfix"></div>


    </div>
</form>