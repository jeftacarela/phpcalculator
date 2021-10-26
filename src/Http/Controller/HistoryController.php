<?php

namespace Jakmall\Recruitment\Calculator\Http\Controller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Jakmall\Recruitment\Calculator\History\Infrastructure\CommandHistoryManagerInterface;

class HistoryController
{
    private $loghistory;

    public function __construct(CommandHistoryManagerInterface $loghistory)
    {
        $this->loghistory = $loghistory;
    }

    public function index(Request $request)
    {
        $data = $this->loghistory->findAll($request->driver);
        $data = collect($data)->map(function ($item) {
            if ($item['command'] == 'add') {
                $item['input'] = explode('+', $item['operation']);
            }
            if ($item['command'] == 'subtract') {
                $item['input'] = explode('-', $item['operation']);
            }
            if ($item['command'] == 'multiply') {
                $item['input'] = explode('*', $item['operation']);
            }
            if ($item['command'] == 'divide') {
                $item['input'] = explode('/', $item['operation']);
            }
            if ($item['command'] == 'power') {
                $item['input'] = explode('^', $item['operation']);
            }
            return array('id' => $item['id'],
                    'command' => $item['command'],
                    'operation' => $item['operation'],
                    'input' => $item['input'],
                    'result' => $item['result']
                );
        });
        return JsonResponse::create(
            $data,
            200
        );
    }

    public function show($id)
    {
        $data = $this->loghistory->find($id);
        $arr = null;
        if ($data['command'] == 'add') {
            $arr = explode('+', $data['operation']);
        }
        if ($data['command'] == 'subtract') {
            $arr = explode('-', $data['operation']);
        }
        if ($data['command'] == 'multiply') {
            $arr = explode('*', $data['operation']);
        }
        if ($data['command'] == 'divide') {
            $arr = explode('/', $data['operation']);
        }
        if ($data['command'] == 'power') {
            $arr = explode('^', $data['operation']);
        }
        $data = array('id' => $data['id'],
                'command' => $data['command'],
                'operation' => $data['operation'],
                'input' => $arr,
                'result' => $data['result']
            );
        return JsonResponse::create($data, 201);
    }

    public function remove($id)
    {
        $this->loghistory->clear('latest', $id);
        $this->loghistory->clear('file', $id);
        return JsonResponse::create(
            array(),
            204
        );
    }

    // private function getDriver($driver) : History {
    //     switch($driver){
    //         case "file":
    //             $loghistory = new HistoryFile();
    //             break;

    //         case "latest":
    //             $loghistory = new HistoryLatest();
    //             break;

    //         case "composite":
    //         default:
    //             $loghistory = new HistoryComposite();
    //             break;
    //     }

    //     return $loghistory;
    // }
}