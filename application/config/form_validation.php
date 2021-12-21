<?php
$config = array(
	'signup' => array(
		array(
			'field' => 'full_name',
			'label' => 'full_name',
			'rules' => 'required',
			'errors' => array(
				'required' => 'You must provide a full name',
			)
		),

		array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'required|min_length[5]|valid_email|is_unique[users.email]',
			'errors' => array(
				'required' => 'You must provide an email',
				'min_length' => 'You must type at least 5 characters',
				'valid_email' => 'Invalid email address',
				'is_unique' => 'This email exists',
			)
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|min_length[5]|max_length[12]',
			'errors' => array(
				'required' => 'You must provide a Password',
				'min_length' => 'You must type at least 5 characters',
				'max_length' => 'Your password must not be longer than 12 characters',
			)
		),
		array(
			'field' => 'role',
			'label' => 'role',
			'rules' => 'required|in_list[user,support]',
			'errors' => array(
				'required' => 'لطفا سمت خود را انتخاب کنید.',
				'in_list' => 'سمت نامعتبر',
			)
		)
	),

	'login' => array(
		array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'required',
			'errors' => array(
				'required' => 'وارد کردن ایمیل الزامی است',
			)
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required',
			'errors' => array(
				'required' => 'وارد کردن رمزعبور الزامی است',
			)
		)
	),

	'update' => array(
		array(
			'field' => 'full_name',
			'label' => 'full_name',
			'rules' => 'required|min_length[5]',
			'errors' => array(
				'required' => 'You must provide a full name',
				'min_length' => 'You must type at least 5 characters',
			)
		),

		array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'required|min_length[5]|valid_email',
			'errors' => array(
				'required' => 'You must provide an email',
				'min_length' => 'You must type at least 5 characters',
				'valid_email' => 'Invalid email address',
			)
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|min_length[5]|max_length[12]',
			'errors' => array(
				'required' => 'You must provide a Password',
				'min_length' => 'You must type at least 5 characters',
				'max_length' => 'Your password must not be longer than 12 characters',
			)
		)
	),

	'createDepartment' => array(
		array(
			'field' => 'department_name',
			'label' => 'department_name',
			'rules' => 'required|min_length[2]|is_unique[departments.name]',
			'errors' => array(
				'required' => 'وارد کردن نام دپارتمان الزامی است.',
				'min_length' => 'نام وارد شده کمتر از 2 کاراکتر دارد.',
				'is_unique' => 'نام دپارتمان تکراری است.',
			)
		)

	),

	'createTicket' => array(
		array(
			'field' => 'ticket-title',
			'label' => 'ticket-title',
			'rules' => 'required|min_length[2]|max_length[75]',
			'errors' => array(
				'required' => 'لطفا عنوان تیکت را وارد نمایید.',
				'min_length' => 'عنوان تیکت باید حداقل 2 کاراکتر داشته باشد.',
				'max_length' => 'عنوان تیکت نمیتواند بیشتر از 75 کاراکتر باشد.',
			)
		),
		array(
			'field' => 'department',
			'label' => 'department',
			'rules' => 'required|integer',
			'errors' => array(
				'required' => 'لطفا دپارتمان مورد نظر را انتخاب کنید',
			)
		),
		array(
			'field' => 'ticket-content',
			'label' => 'ticket-content',
			'rules' => 'required|min_length[2]|max_length[1024]',
			'errors' => array(
				'required' => 'لطفا متن تیکت را وارد نمایید.',
				'min_length' => 'متن تیکت باید حداقل 2 کاراکتر داشته باشد',
				'max_length' => 'متن تیکت طولانی است.',
			)
		),

	),

	'createAnswer' => array(
		array(
			'field' => 'ticket-answer-content',
			'label' => 'ticket-answer-content',
			'rules' => 'required|min_length[9]|max_length[500]',
			'errors' => array(
				'required' => 'لطفا متن پاسخ را وارد نمایید.',
				'min_length' => 'متن پاسخ باید حداقل 2 کاراکتر داشته باشد.',
				'max_length' => 'متن پاسخ نمیتواند بیشتر از 500 کاراکتر باشد.',
			)
		),
	),

	'createSupport' => array(
		array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'required|valid_email',
			'errors' => array(
				'required' => 'لطفا ایمیل خود را وارد نمایید.',
				'valid_email' => 'ایمیل نامعتبر',
				'is_unique' => 'ایمیل تکراری است.',
			)
		),

		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|min_length[5]|max_length[12]',
			'errors' => array(
				'required' => 'لطفا رمز عبور خود را وارد نمایید.',
				'min_length' => 'طول رمز عبور باید حداقل 5 کاراکتر باشد.',
				'max_length' => 'طول رمز عبور نباید بیشتر از 12 کاراکتر باشد.',
			)
		),
		array(
			'field' => 'full-name',
			'label' => 'full-name',
			'rules' => 'required',
			'errors' => array(
				'required' => 'لطفا نام و نام خانوادگی خود را وارد نمایید.',
			)
		),
		array(
			'field' => 'department',
			'label' => 'department',
			'rules' => 'required|integer',
			'errors' => array(
				'required' => 'لطفا دپارتمان مورد نظر را انتخاب کنید',
			)
		),
	),
);
