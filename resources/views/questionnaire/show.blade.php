@extends('app')

@section('content')
<div class="row">
   
    <div class="col-md-6">
        <div class="block">
            <div class="block-header block-header-default bg-primary-light">
                <h3 class="block-title">Questionnaire Form</h3>
            </div>
            <div class="block-content">
        
            <iframe src="{{$questionnaire->form_link}}" width="100%" height="1000"></iframe>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="block">
            <div class="block-header block-header-default bg-primary-light">
                <h3 class="block-title">Available Questionnaires</h3>
            </div>
            <div class="block-content">
        
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full table-responsive">
                    <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th>Title</th>
    
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Description</th>
                        {{--                    <th class="text-center" style="width: 15%;">Actions</th>--}}
                        <th>Kobo</th>
                        {{-- <th>Form</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questionnaires as $questionnaire)
                        <tr>
                            <td class="text-center"><a href="/project/{{$questionnaire->id}}" style="background:none">{{ $questionnaire->id }}</a></td>
                            <td class="font-w600"><a href="/questionnaire/{{$questionnaire->id}}" style="background:none">{{ $questionnaire->title }}</a></td>
                            <td class="d-none d-sm-table-cell"><a href="/questionnaire/{{$questionnaire->id}}" style="background:none">{{ $questionnaire->description }}</a></td>
                            <td class="d-none d-sm-table-cell popupWindow"><a href="{{$questionnaire->kobo_link}}" style="background:none" title="Open Seperately">Details <i class="fa fa-window-restore ml-5"></i>
                            </a></td>
                            {{-- <td class="d-none d-sm-table-cell"><a href="/questionnaire/{{$questionnaire->id}}" style="background:none">Show</a></td> --}}
                        </tr>
                    @endforeach
    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@stop


@section('scripts')
  
    <script>
    let params_ = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=1000,height=1000, left=300, top=100`;
     $('.popupWindow').click(function(e) {
        e.preventDefault();
            let url = $(this).children('a').first().attr('href')
            // alert(url)
            open(url, 'Kobo', params_)
    })

        $(document).ready(function(){
            let active_form = `{{ $questionnaire->form_link }}`
            $(`a[href="${active_form}"]`).parent('tr').addClass('active-form')
        });
    </script>
@stop