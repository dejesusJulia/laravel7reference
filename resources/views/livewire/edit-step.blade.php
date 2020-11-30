
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

        <div class="input-group m-1" wire:key="{{$loop->index}}">
            <input type="text" name="stepName[]" class="form-control" placeholder="step number {{$loop->index + 1}}" @if(is_array($step)) value="{{$step['name']}} @endif">

            <div class="input-group-append">
                <button class="btn btn-danger btn-sm" wire:click="decrement({{$loop->index}})" onclick="event.preventDefault()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <input type="hidden" name="stepId[]" value="{{$step['id'] ?? false}}">
        </div>   
        
    @endforeach
    
    
</div>

