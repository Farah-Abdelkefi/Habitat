<x-admin.layout active="Collection">
    <x-slot name="styles">


    </x-slot>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Refrenced Products </h3>
        </div>
        <div class="card-body">
            <div class="row gutters-sm">
                @foreach($referencedproducts as $refproduct)
                    <x-form.image-select :product="$refproduct" />
                @endforeach

            </div>
        </div>
    </div>
    {{$referencedproducts->links()}}

    <x-slot name="scripts">

        <script src="{{asset('assets/bundles/selectize.bundle.js')}}"></script>
        <script src="{{asset('assets/js/vendor/selectize.js')}}"></script>

    </x-slot>
</x-admin.layout>
