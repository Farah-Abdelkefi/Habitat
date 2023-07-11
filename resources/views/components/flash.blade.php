@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="alert-info fixed bg-blue-500  py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
    >
        <p  >{{ Session::get('success') }}</p>
    </div>
@endif
