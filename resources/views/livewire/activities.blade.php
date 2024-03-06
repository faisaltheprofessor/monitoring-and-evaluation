<div class="block-content block-content-full">
    <div class="js-nestable-connected-simple dd">
        <ol class="dd-list" style="width: 100%">
            <table class="table table-bordered table-sm">
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
                                @php
                                    $provinces = \App\MonthlyProgress::where('activity_id', $current_progress->activity->id)->groupBy('province_id')->get('province_id');
                                @endphp
                                @foreach($provinces as $province)
                                    <ol class="dd-list" wire:click="update">
                                        <li class="dd-item dd-nodrag" data-id="2">
                                            <div class="dd-handle">{{ \App\Province::find($province->province_id)->name}}</div>
                                        </li>

                                    </ol>

                                @endforeach
                            </li>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        </ol>
    </div>
</div>
