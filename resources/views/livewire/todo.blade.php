<div>
    <!-- <input type="text" wire:model="todo">
    <button wire:click="add">add</button> -->
    <form wire:submit="add">
        <input type="text" wire:model="todo">
        <button type="submit">add</button>
    </form>
    <ul>
        @foreach($todos as $todo)
        <li>{{$todo}}</li>
        @endforeach
    </ul>
</div>