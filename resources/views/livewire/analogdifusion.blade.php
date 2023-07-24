

<div >
    <form wire:submit.prevent="makeQuery">
        <div  >
        <div >
    <p>wavymulder/Analog-Diffusion</p>
</div>
            <label for="inputData">Enter Text:</label>
            <input type="text" wire:model="inputData" id="inputData" placeholder="Your sentence here..." size="50">
        </div >
        <button type="submit" >Make API Query:-</button>
    </form>

    @if ($resultAnalog)
        <div>
            <!-- Display the API response or process it as needed -->
            <p>Analog Diffusion Model Result:</p>
            
            <img src="data:image/jpeg;base64,{{ base64_encode($resultAnalog) }}" alt="Result Image">
        </div>
    @endif
</div>
