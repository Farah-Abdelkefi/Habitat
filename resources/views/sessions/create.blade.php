<x-form.layout>

    <div class="box">
        <form method="POST" action="/login" >
            <span><h2>S'identifier</h2></span>
            <br>
            @csrf
            <x-form.input name="email" type="email" required />
            <br>
            <x-form.input name="password" type="password" autocomplete="new-password" required />
            <br>
            <input id="button" type="submit" value="Submit">

        </form>
    </div>
</x-form.layout>

