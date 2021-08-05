<x-app-layout>
    <section class="dashboard section" style="margin-top:30px">
        <div class="container">
            <div class="row">
                @include('cart::inc.sidebar')
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="col-12">
                        <h3>Testimony Page</h3>
                    </div>
                   @livewire('testimony-save',['user_id'=>$id,'token'=>$token])
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
