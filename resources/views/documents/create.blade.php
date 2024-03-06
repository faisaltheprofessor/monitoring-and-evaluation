@extends('app')

@section('main-content')
    <form action="/document" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="owner">Document owner</label>
            <select name="owner" id="owner" class="form-control"">
                <option selected>Choose...</option>
                <option value="m&e">Monitoring and Evaluation</option>
                <option value="CLAP">CLAP</option>
                <option value="SNaPP2">SNaPP2</option>
                <option value="project_strategic_document">Project Strategic Document</option>
                <option value="Other">Other</option>
            </select>
            <i class="form-group__bar"></i>

        </div>


        <div class="form-group">
            <label for="type">Document type</label>
            <select name="type" id="type" class="form-control">
                <option selected>Choose...</option>
                <option value="monthly">Monthly</option>
                <option value="annual">Annual</option>
                <option value="quarterly">Quarterly</option>     
            </select>
            <i class="form-group__bar"></i>

        </div>

        <div class="form-group">
            <label for="name">document name</label>
            <input type="text" class="form-control" name="name" id="name">
            <i class="form-group__bar"></i>
        </div>

        <div class="form-group">
            <label for="name">Document</label>
            <input type="file" class="form-control" name="document" id="name">
            <i class="form-group__bar"></i>
        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit"><i class="zmdi zmdi-upload"></i> Upload</button>
        </div>

    </form>

@stop