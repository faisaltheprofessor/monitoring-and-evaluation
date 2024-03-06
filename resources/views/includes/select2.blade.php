<script src="{{ asset('theme/vendors/select2/js/select2.full.min.js') }}"></script>
<script>
    // $('.select2').select2()
    // $('.select2-ajax').select2({
    //     ajax: {
    //         url: '/ajax/refreshDropDown',
    //         dataType: 'json'
    //         // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
    //     }
    // });


    //Project Select2
    projects = () => {
        $("#project_id").select2({
            placeholder: "Select a Project",
            allowClear: true,
            ajax: {
                url: "/ajax/refreshProject",
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: "{{ csrf_token() }}",
                        search: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        }).on('select2:select', () => {
            $('#component_id').empty();
            $('#subcomponent_id').empty();
            $('#activity_id').empty();
            // components()
        });
    }


    // Component Select2

    components = () => {
        $("#component_id").select2({
            placeholder: "Select a Component",
            allowClear: true,
            ajax: {
                url: "/ajax/refreshComponent",
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: "{{ csrf_token() }}",
                        search: params.term, // search term
                        project_id: $('#project_id').val()
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        }).on('select2:select', () => {
            $('#subcomponent_id').empty();
            $('#activity_id').empty();
        });
    }


    subcomponents = () => {
        $("#subcomponent_id").select2({
            placeholder: "Select a Subomponent",
            allowClear: true,
            ajax: {
                url: "/ajax/refreshSubComponent",
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: "{{ csrf_token() }}",
                        search: params.term, // search term
                        component_id: $('#component_id').val()
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        }).on('select2:select', () => {
            $('#activity_id').empty();
        });
        ;
    }


    activities = () => {
        $("#activity_id").select2({
            placeholder: "Select an Activity",
            allowClear: true,
            ajax: {
                url: "/ajax/refreshActivity",
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: "{{ csrf_token() }}",
                        search: params.term, // search term
                        project_id: $('#project_id').val()
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });
    }

    //Provinces
    provinces = () => {
        $("#province_id").select2({
            placeholder: "Select a Province",
            allowClear: true,
            ajax: {
                url: "/ajax/refreshProvince",
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: "{{ csrf_token() }}",
                        search: params.term, // search term
                        // subcomponent_id: $('#subcomponent_id').val()
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        }).on('select2:select', () => {
            $('#district_id').empty();
            $('#village_id').empty();

            // components()
        });
        ;
    }


    //Districts
    districts = () => {
        $("#district_id").select2({
            placeholder: "Select a District",
            allowClear: true,
            ajax: {
                url: "/ajax/refreshDistrict",
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: "{{ csrf_token() }}",
                        search: params.term, // search term
                        province_id: $('#province_id').val()
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        }).on('select2:select', () => {
            $('#village_id').empty();
        });
    }

    //Villages
    villages = () => {
        $("#village_id").select2({
            placeholder: "Select a Village",
            allowClear: true,
            ajax: {
                url: "/ajax/refreshVillage",
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: "{{ csrf_token() }}",
                        search: params.term, // search term
                        district_id: $('#district_id').val()
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });
    }


    projects()
    components()
    subcomponents()
    activities()
    provinces()
    districts()
    villages()

    $('select').on('select2:select', function () {
        projects()
        components()
        subcomponents()
        activities()
        provinces()
        villages()
    });


</script>
