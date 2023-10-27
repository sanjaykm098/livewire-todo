<div class="container">
    <div class="vh-100 py-5 w-100">
        <div class="text-center mb-5">
            <h1>Todo List</h1>
        </div>
        <div class="row" >
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <input type="text" wire:model="task" wire:keydown.enter='AddTask' class="form-control" placeholder="Enter Task And Press Enter">
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="col-md-12 mt-5">
            <table class="table table-hover">
                <thead>
                    <tr class="table-active">
                        <td>Sr.</td>
                        <td>Task</td>
                        <td>Status</td>
                        <td>Action</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($todos as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->task ?? ''}}</td>
                        <td>{{$item->status == 0 ? 'Open' : 'Done'}}</td>
                        <td><label for="{{$item->id}}c"> <input id="{{$item->id}}c" type="checkbox" {{$item->status == 1 ? 'disabled checked' : ''}} wire:change="markDone({{$item->id}})" > Mark Done</label></td>
                        <td><label for="{{$item->id}}d"> <input id="{{$item->id}}d" type="checkbox" wire:change="delete({{$item->id}})"> Delete</label></td>
                    </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="5">No Task Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>