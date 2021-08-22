## Сайт-блог с административной панелью
### Три типа пользователей:
#### 1) Зарегистрированный пользователь. 
 - Может осталять комментарии на сайте под статьями.
 - Может изменять свои данные в личном кабинете.

 Логин: user1@test.ru <br>
 Пароль: 123456

#### 2) Администратор.
Добавляется путем изменения любым другим администратором статуса пользователя до админа.
 - Может осталять комментарии на сайте под статьями.
 - Может изменять свои данные в личном кабинете в админке.
 - Может удалять обычных пользователей.
 - Может изменить статус пользователя до администратора.
 - Может добавлять, редактировать, удалять категории, теги, статьи в админке.

 Логин: admin2@test.ru <br>
 Пароль: 123456

#### 3) Старший администратор.
Данный статус присваевается в базе данных.
 - Может осталять комментарии на сайте под статьями.
 - Может изменять свои данные в личном кабинете в админке.
 - Может удалять обычных пользователей и администраторов.
 - Может изменить статус пользователя до администратора и администратора до пользователя.
 - Может добавлять,редактировать, удалять категории, теги, статьи в админке.

 Логин: admin@test.ru <br>
 Пароль: 123456

---
#### Что использовалось при создании:
Шаблон для блога: https://html.design/download/markedia-marketing-template/ <br>
Для админ панели использовался: AdminLTE <br>
php: ^7.2.5|^8.0 <br>
Laravel: ^7.29 <br>
laravel-sluggable версии 7.0: https://github.com/cviebrock/eloquent-sluggable <br>
CKEditor 5: https://ckeditor.com/ckeditor-5/ <br>
CKFinder: https://ckeditor.com/ckfinder/ <br>

#### При клонировании через git:
Нужно в начале создать базу данных, прописать в env соединение и далее запустить миграции. <br>
После на сайте зарегистрировать пользователя и в таблице users в полу is_admin проставить 2, чтобы создать старшего админа. <br> 
Статьи, категории, теги, других администраторов и пользователей можно добавить через админ панель. 


