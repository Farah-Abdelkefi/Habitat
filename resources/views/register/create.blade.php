<x-form.layout>
<div class="box">
    <form method="POST" action="/register" >
        <span><h2>Inscription</h2></span>
        <br>
        @csrf
        <br>
        <x-form.input name="name" required />
        <br>
        <x-form.input name="username" required />
        <br>
        <x-form.input name="email" type="email" required />
        <br>
        <x-form.input name="password" type="password" autocomplete="new-password" required />
        <br>
        <input id="button" type="submit" value="Submit">

    </form>
</div>
</x-form.layout>
