<form wire:submit.prevent="sendReportForm">
    <input type="hidden" hidden wire:model="reported_comment"/>
    <div class="modal-body">
        <i class="fas fa-exclamation-circle text-warning" style="font-size:30px;"></i>
        <h4>Report
            Comment @if(isset($reported_comment['comment_by']))
                by {{ $reported_comment['comment_by']['name'] }} @endif</h4>
        <div class="form-group mt-5">
            <label> What do you observe about this comment?</label>
            <textarea rows="5" class="form-control" wire:model.lazy="reporter_message"
                      placeholder="Enter Your Report"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Report
        </button>
    </div>
</form>
