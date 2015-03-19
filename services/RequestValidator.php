<?php

use Symfony\Component\Validator\Validator;
use Symfony\Component\HttpFoundation\Request;

class RequestValidator
{
    /**
     * @var Validator
     */
    protected $validator;

    /**
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param Request $request
     * @param $constraints
     * @return array
     */
    public function validate(Request $request, $constraints)
    {
        /** @var \Symfony\Component\Validator\ConstraintViolationList $errors */
        $errors = $this->validator->validateValue($request->request->all(), $constraints);

        if (count($errors) > 0) {
            $messages = [];

            foreach ($errors as $error) {
                $messages[trim($error->getPropertyPath(), '[]')][] = $error->getMessage();
            }

            return $messages;
        }

        return [];
    }
}
