<?php

namespace App\Controllers;

use App\Helpers\CommentHelper;
use App\Helpers\DateHelper;
use App\Models\Comment;


class Home extends BaseController
{
    public function index(): string
    {
        $sortBy = $this->request->getGet('sort_by') ?? 'id';
        $sortOrder = $this->request->getGet('sort_order') ?? 'desc';

        $validSortOrders = array_keys(CommentHelper::getOrder());
        $sortOrder = in_array(strtolower($sortOrder), $validSortOrders) ? strtolower($sortOrder) : 'desc';

        $comment = new Comment();

        $comment->orderBy($sortBy, $sortOrder);

        $data = [
            'comments' => $comment->paginate(4),
            'pager' => $comment->pager,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
        ];

        return view('comments', $data);
    }

    public function store()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/home')->withInput();
        }

        $rules = [
            'name' => 'valid_email',
            'text' => 'required|min_length[25]|max_length[255]',
            'date' => 'in_list[' . implode(',', DateHelper::getFormats()) . ']',
        ];

        if ($this->validate($rules)) {
            $data = [
                'name' => $this->request->getPost('name'),
                'text' => $this->request->getPost('text'),
                'date' => date($this->request->getPost('date')),
                'created_at' => date("Y-m-d"),
            ];

            try {
                $comment = new Comment();
                $comment->save($data);
                session()->setFlashdata('created', 'Comment created');
                return redirect()->back();
            } catch (\Exception $e) {
                session()->setFlashdata('validation_errors', [$e->getMessage()]);
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('validation_errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        if ($this->request->getMethod() != 'post' || !isset($id))
            return redirect()->to('/home');

        $comment = new Comment();
        $comment->delete($id);

        return redirect()->back();
    }
}
