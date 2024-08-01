<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:th="http://www.thymeleaf.org">
    <head th:replace="~{layout/plantilla :: head}">
        <title>1</title>
    </head>
    <body>
        <header th:replace="~{views/plantilla :: header}"></header>

        <section th:replace="~{agendar/fragmentos :: editardonacion}"></section>
        
        <footer th:replace="~{views/plantilla :: footer}"></footer>

    </body>
</html>
