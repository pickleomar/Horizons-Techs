<?php

namespace App\Services;

use App\Repositories\IssueRepository;

class IssueService
{
    protected $issueRepository;
    public function __construct(IssueRepository $issueRepository)
    {
        $this->issueRepository = $issueRepository;
    }

    public function getAllIssues()
    {
        return $this->issueRepository->all();
    }
    public function getIssueById($id)
    {
        return $this->issueRepository->find($id);
    }


    public function getIssueByUser($user_id)
    {
        return $this->issueRepository->all()->where("author_id", $user_id);
    }

    public function createIssue(array $data)
    {
        return $this->issueRepository->create($data);
    }
    public function updateIssue($id, array $data)
    {
        return $this->issueRepository->update($id, $data);
    }
    public function deleteIssue($id)
    {
        return $this->issueRepository->delete($id);
    }


    public function approveIssue($issue_id)
    {
        $issue = $this->issueRepository->find($issue_id)->first();
        if (!$issue) {
            return false;
        }
        return $this->issueRepository->update($issue_id, ["status" => "Approved"]);
    }
    public function rejectIssue($issue_id)
    {
        $issue = $this->issueRepository->find($issue_id)->first();
        if (!$issue) {
            return false;
        }
        return $this->issueRepository->update($issue_id, ["status" => "Rejected"]);
    }


    public function publishIssue($issue_id, $public = 0)
    {
        $issue = $this->issueRepository->find($issue_id)->first();
        if (!$issue) {
            return false;
        }
        return $this->issueRepository->update($issue_id, ["status" => "Published"]);
    }

    public function publicIssue($issue_id)
    {
        $issue = $this->issueRepository->find($issue_id)->first();
        if (!$issue) {
            return false;
        }
        return $this->issueRepository->update($issue_id, ["public" => 1]);
    }


    public function privateIssue($issue_id)
    {
        $issue = $this->issueRepository->find($issue_id)->first();
        if (!$issue) {
            return false;
        }
        return $this->issueRepository->update($issue_id, ["public" => 0]);
    }

    public function getPublicIssues()
    {
        return $this->getAllIssues()->where("public", 1)->all();
    }
}
