<div>
    <div class="block-content block-content-full">
        <div class="js-nestable-connected-simple dd">
            <ol class="dd-list" style="width: 100%">
                <table class="table table-bordered table-responsive" style="width:100% !important">
                    <thead>
                    <tr>
                        <td></td>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($progress as $current_progress)
                        <tr>
                            <td>
                                <li class="dd-item dd-collapsed" data-id="{{ $current_progress->id }}">
                                    <div class="dd-handle">{{ $current_progress->activity->name }}</div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="2">
                                            <div class="dd-handle">Themes</div>
                                        </li>
                                        <li class="dd-item" data-id="3">
                                            <div class="dd-handle">Apps</div>
                                        </li>
                                        <li class="dd-item" data-id="4">
                                            <div class="dd-handle">Games</div>
                                        </li>
                                    </ol>
                                </li>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

            </ol>
        </div>
    </div>
</div>
