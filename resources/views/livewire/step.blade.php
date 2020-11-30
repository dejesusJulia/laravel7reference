
<div class="form-group">
    <div class="d-flex justify-content-center">
        <h3 class="m-2">Add step</h3>
        <button id="sampleBtn" class="btn" wire:click="increment" onclick="event.preventDefault()">
            <span>
                <i class="far fa-plus-square"></i>
            </span>
        </button>
    </div>   

    @foreach ($steps as $step)
        <div class="input-group m-1">
            <input type="text" name="step[]" class="form-control" placeholder="step number {{$step + 1}}" wire:key="{{$step}}">
            <div class="input-group-append">
                <button class="btn btn-danger btn-sm" wire:click="decrement({{$loop->index}})" onclick="event.preventDefault()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>   
    @endforeach
    
    
</div>
