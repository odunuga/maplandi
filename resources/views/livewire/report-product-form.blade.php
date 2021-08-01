<form wire:submit.prevent="sendReportProductForm">
    <input type="hidden" hidden wire:model="reported_product"/>
    <div class="modal-body">
        <i class="fas fa-exclamation-circle text-warning" style="font-size:30px;"></i>
        <h4>Report @if(isset($reported_product)) {{ $reported_product['title'] }} @endif</h4>
        <div class="form-group mt-5">
            <label> What do you observe about this product?</label>
            <textarea rows="5" class="form-control" wire:model.lazy="reporter_message"
                      placeholder="Enter Your Report"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Report
        </button>
    </div>
</form>
