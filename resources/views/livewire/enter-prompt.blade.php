<div>
    <form wire:submit.prevent="makeQuery">
        <div>
            <div>
                <p>johnslegers/epic-diffusion</p>
            </div>
            <label for="inputText">Enter Text:</label>
            <input type="text" wire:model="inputText" id="inputText" placeholder="Your sentence here..." size="50">
        </div>
        <button type="submit">Make API Query:-</button>
    </form>

    @if ($resultImage)
        <div>
            <!-- Display the API response or process it as needed -->
            <p>Epic Diffusion Model Result:</p>
            
            <img src="data:image/jpeg;base64,{{ base64_encode($resultImage) }}" alt="Result Image" >
        </div>
    @endif
</div>