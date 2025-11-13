
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blade Test Page</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .box { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; }
        .even { background-color: #e0f7fa; }
        .odd { background-color: #ffe0b2; }
    </style>
</head>
<body>
    <h1>Blade Test Page</h1>

    {{-- Variables --}}
    @php
        $name = 'Jouda';
        $age = 22;
        $users = [
            ['name' => 'Alice', 'age' => 18],
            ['name' => 'Bob', 'age' => 25],
            ['name' => 'Charlie', 'age' => 20]
        ];
        $fruits = ['Apple', 'Banana', 'Orange', 'Mango'];
        $showMessage = true;
    @endphp

    {{-- Simple condition --}}
    <div class="box">
        <h2>Condition Test</h2>
        @if($age >= 18)
            <p>{{ $name }} is an adult.</p>
        @else
            <p>{{ $name }} is not an adult.</p>
        @endif
    </div>

    {{-- Unless condition --}}
    <div class="box">
        <h2>Unless Test</h2>
        @unless($age < 18)
            <p>{{ $name }} is allowed.</p>
        @endunless
    </div>

    {{-- isset / empty --}}
    <div class="box">
        <h2>isset & empty Test</h2>
        @isset($name)
            <p>Name is set: {{ $name }}</p>
        @endisset

        @empty($users)
            <p>No users found.</p>
        @else
            <p>Users exist.</p>
        @endempty
    </div>

    {{-- Switch / Case --}}
    <div class="box">
        <h2>Switch Test</h2>
        @switch($age)
            @case(18)
                <p>Just adult</p>
                @break
            @case(22)
                <p>Exactly 22!</p>
                @break
            @default
                <p>Other age</p>
        @endswitch
    </div>

    {{-- Loops --}}
    <div class="box">
        <h2>Foreach Loop Test</h2>
        @foreach($users as $user)
            <p>{{ $user['name'] }} - {{ $user['age'] }} years old</p>
        @endforeach
    </div>

    <div class="box">
        <h2>Forelse Loop Test</h2>
        @forelse($fruits as $fruit)
            <p>{{ $loop->iteration }}. {{ $fruit }}</p>
        @empty
            <p>No fruits available</p>
        @endforelse
    </div>

    <div class="box">
        <h2>While Loop Test</h2>
        @php $i = 0; @endphp
        @while($i < count($fruits))
            <p>{{ $fruits[$i] }}</p>
            @php $i++; @endphp
        @endwhile
    </div>

    {{-- Loop helpers --}}
    <div class="box">
        <h2>Loop Helpers Test</h2>
        @foreach($fruits as $fruit)
            <p class="{{ $loop->even ? 'even' : 'odd' }}">
                {{ $loop->iteration }}: {{ $fruit }} 
                @if($loop->first) (first) @endif
                @if($loop->last) (last) @endif
            </p>
        @endforeach
    </div>

    {{-- Include Example --}}
    <div class="box">
        <h2>Include Test</h2>
        @include('partials.message', ['msg' => 'Hello from include!'])
    </div>

    {{-- Component Example --}}
    <div class="box">
        <h2>Component Test</h2>
        <x-alert type="success" :message="'This is a Blade component!'" />
    </div>

    {{-- Raw PHP --}}
    <div class="box">
        <h2>Raw PHP Test</h2>
        <?php echo "<p>This is printed using raw PHP!</p>"; ?>
    </div>
</body>
</html>
