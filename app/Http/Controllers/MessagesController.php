<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message as MessageModel;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MessagesController extends Controller
{
    /**
     * @param Request $request
     */
    public function message(Request $request)
    {

        $message = MessageModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'question' => $request->question,
        ]);

        $messageID = $message->id;

        foreach ($request->file('files') as $file) {
            $filename = $file->store('files');
            File::create([
                'message_id' => $messageID,
                'name' => $filename
            ]);
        }

        $adminEmail = Config::where('name', 'email')->first();

        mail($adminEmail, 'Добавлена новая заявка на сайте', 'Код заявки: '.$messageID);

        return view('sent');
    }
}
