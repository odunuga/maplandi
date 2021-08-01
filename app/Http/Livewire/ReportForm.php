<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Entities\CommentReport;

class ReportForm extends Component
{
    public $reported_comment;
    public $reporter_message;
    protected $listeners = ['report_comment' => 'prepare_report'];


    public function prepare_report($comment)
    {
        $this->reported_comment = $comment;
        $this->emit('show_report_modal');
    }

    public function sendReportForm()
    {
        if (auth()->check()) {
            $check_report = CommentReport::where('user_id', auth()->id());
            if ($check_report->count() < 1) {
                CommentReport::create([
                    'user_id' => auth()->id(),
                    'comment_id' => $this->reported_comment['id'],
                    'comment' => $this->reporter_message
                ]);
            }
            $this->emit('alert', ['success', __('texts.report_sent')]);
        } else {
            $this->emit('alert', ['error', __('texts.report_login_required')]);
        }
        $this->emit('hide_report_modal');
    }

    public function render()
    {
        return view('livewire.report-form');
    }
}
