<?php
namespace Student\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class StudentTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getStudent($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();

        return $row;
    }

    public function saveStudent(Student $student)
    {
        $data = [
            'id' => $student->id,
            'name' => $student->name,
            'gpa'  => $student->gpa,
        ];

        $id = (int) $student->id;

        if ($this->getStudent($id)==0) {
            $this->tableGateway->insert($data);
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteStudent($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}