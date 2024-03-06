<form class="row" action="/ajax/item" method="post">
    {{ csrf_field() }}
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Project Name</label>
            <input type="text" class="form-control" name="name" id="name">
            <i class="form-group__bar"></i>
        </div>

        <div class="form-group">
            <label for="name_dari">اسم پروژه</label>
            <input type="text" class="form-control" dir="rtl" id="name_dari" name="name_dari">
            <i class="form-group__bar"></i>
        </div>

        <div class="form-group">
            <label for="name_dari">Abbreviation</label>
            <input type="text" class="form-control" id="abbreviation" name="abbreviation">
            <i class="form-group__bar"></i>
        </div>
        <input type="hidden" name="model" value="Project">
        <div class="clearfix"></div>

    </div>
</form>