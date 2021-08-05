<form wire:submit.prevent="submit" method="post" class="form">
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="form-group">
                <input wire:model="name" type="text"
                       placeholder="Your Name" required="required">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="form-group">
                <input wire:model="phone" type="tel" placeholder="Your Phone"
                       required="required" >
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="form-group">
                <input wire:model.lazy="subject" type="text" placeholder="Your Subject"
                       required="required">

            </div>
        </div>
        <div class="col-12">
            <div class="form-group message">
                <textarea wire:model.lazy="message" placeholder="Your Message"></textarea>
                @error('message') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group button">
                <button class="btn" type="submit"><i wire:loading class="lni lni-is-spinning lni-spinner"></i>
                    Submit Message
                </button>
                @if(session()->has('contact_success'))
                    <p class="alert alert-success">{{ session('contact_success') }}</p>
                @endif
            </div>
        </div>

    </div>
</form>
