Project is being developed over PHP 8.2 language.
## Project Setup Instructions
- Clone the project repository using the following command:
```bash
## Clone the codebase
https://github.com/sunilsharmaji/digital-certificate-system.git
```
- Navigate to Main Project Folder  **~/digital-certificate-system**
```bash
## Move to the project folder path at `~/digital-certificate-system`
cd digital-certificate-system
```
- Switch to the master branch:
```bash
## Switch branch
git checkout master
```
- Run the following to install dependency packages.
```bash
 composer install
```
- Execute the following command to run the project:
```bash
 php src/Application.php
 
     ## Welcome to the Digital Certificate Issuance System of TechEd Academy ##
    
    Please select an operation.
    1. Register a student.
    2. Display registered students.
    3. Issue a digital certificate.
    4. Verify a certificate.
    
    Enter operation number.:
```

## Student Registration
Register a student
```bash
Enter operation number.: 1

Enter name: TestUser
Enter email: test@email.com
Enter age: 32
Enter course (math, english, politics): math

Student registered successfully:
```

## Display  Students

```bash
Enter operation number.: 2

student_id    name                     email                    age                      course
1                   TestUser                test@email.com    32                        math
```
## Issue a digital certificate
    Enter operation number.: 3
    
    Enter student Id: 1
    eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJ2YyI6eyJAY29udGV4dCI6WyJodHRwczovL3d3dy53My5vcmcvMjAxOC9jcmVkZW50aWFscy92MSIsImh0dHBzOi8vd3d3LnRlY2hlZGFjYWRlbXkuY29tL2NvbnRleHQvdjEiXSwidHlwZSI6WyJWZXJpZmlhYmxlQ3JlZGVudGlhbCIsIkNvdXJzZUNvbXBsZXRpb25DcmVkZW50aWFsIl0sImlzc3VlciI6IlRlY2hFZCBBY2FkZW15IiwiaXNzdWFuY2VEYXRlIjoiMjAyNC0wMS0yNyAyMDoyNDoyNSIsImNyZWRlbnRpYWxTdWJqZWN0Ijp7ImlkIjoiZGlkOnV1aWQ6NzZkNDI1MDUtMTM4My00ZGY5LTk1MmItZjNkZDNkNjMwYm  IyIiwic3R1ZGVudF9uYW1lIjoiVGVzdFVzZXIiLCJjb3Vyc2VfbmFtZSI6Im1hdGgiLCJhZ2UiOiIzMiIsImVtYWlsIjoidGVzdEBlbWFpbC5jb20iLCJjb21wbGV0aW9uX2RhdGUiOiIyMDI0LTAxLTI3IDIwOjI0OjI1In19fQ.SAOesVi1mdd6cdEwiFJZ7GupHlqsun8w5pGtqjX-3dh27Ui87FeE16Eo7QKjqSb-mGXMzhKMV6IafGIzE-yjUrHqiuSTGEoUJZUAgaTNXurROs9Yo5EnQjO6h9Z8dKgze10K-IU4KrmvwW8uZaAOXxwhspOWNLhMEFHfmODL0KpZC8xWb7YxhRsqlA5qAaT4H-l7PAdsnUxJz7WDLzATiC14TS0AwNIH0E7JDp8qgZvYHfcxyO0LIkcfYMd6zO0D8kYlCM1Lbb32JWw9_G9ePpHPhdJMPxm-M1iclLvqTrNmZVLCwBlqiBNdl61lUoG0VO7WFKbI4iyseBN7UAVtaQ

## Verify a digital certificate
    Enter operation number.: 4
    
    Enter digital certificate token: eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJ2YyI6eyJAY29udGV4dCI6WyJodHRwczovL3d3dy53My5vcmcvMjAxOC9jcmVkZW50aWFscy92MSIsImh0dHBzOi8vd3d3LnRlY2hlZGFjYWRlbXkuY29tL2NvbnRleHQvdjEiXSwidHlwZSI6WyJWZXJpZmlhYmxlQ3JlZGVudGlhbCIsIkNvdXJzZUNvbXBsZXRpb25DcmVkZW50aWFsIl0sImlzc3VlciI6IlRlY2hFZCBBY2FkZW15IiwiaXNzdWFuY2VEYXRlIjoiMjAyNC0wMS0yNyAyMDoyNDoyNSIsImNyZWRlbnRpYWxTdWJqZWN0Ijp7ImlkIjoiZGlkOnV1aWQ6NzZkNDI1MDUtMTM4My00ZGY5LTk1MmItZjNkZDNkNjMwYmIyIiwic3R1ZGVudF9uYW1lIjoiVGVzdFVzZXIiLCJjb3Vyc2VfbmFtZSI6Im1hdGgiLCJhZ2UiOiIzMiIsImVtYWlsIjoidGVzdEBlbWFpbC5jb20iLCJjb21wbGV0aW9uX2RhdGUiOiIyMDI0LTAxLTI3IDIwOjI0OjI1In19fQ.SAOesVi1mdd6cdEwiFJZ7GupHlqsun8w5pGtqjX-3dh27Ui87FeE16Eo7QKjqSb-mGXMzhKMV6IafGIzE-yjUrHqiuSTGEoUJZUAgaTNXurROs9Yo5EnQjO6h9Z8dKgze10K-IU4KrmvwW8uZaAOXxwhspOWNLhMEFHfmODL0KpZC8xWb7YxhRsqlA5qAaT4H-l7PAdsnUxJz7WDLzATiC14TS0AwNIH0E7JDp8qgZvYHfcxyO0LIkcfYMd6zO0D8kYlCM1Lbb32JWw9_G9ePpHPhdJMPxm-M1iclLvqTrNmZVLCwBlqiBNdl61lUoG0VO7WFKbI4iyseBN7UAVtaQ
    
    Verification successful!
## Exit from the system
    Enter operation number.: 5
These steps assume you have [Git](https://git-scm.com/ "Git"), [Composer](https://getcomposer.org/download/ "Composer"), [PHP 8.2](https://www.php.net/downloads "PHP 8.2") installed on your system. The provided commands will set up the project.