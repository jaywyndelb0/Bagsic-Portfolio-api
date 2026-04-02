# Sample JSON Responses - Jay Portfolio API

This document provides examples of the expected JSON responses from the Jay Portfolio API.

## 1. Authentication

### Register Successful
**POST /api/register**
```json
{
    "success": true,
    "message": "User registered successfully",
    "data": {
        "user": {
            "id": 1,
            "name": "Jay Wyndel Bagsic",
            "email": "jaywyndelb0@gmail.com"
        },
        "token": "1|abcdefghijklmnopqrstuvwxyz"
    }
}
```

### Login Successful
**POST /api/login**
```json
{
    "success": true,
    "message": "Login successful",
    "data": {
        "user": {
            "id": 1,
            "name": "Jay Wyndel Bagsic",
            "email": "jaywyndelb0@gmail.com"
        },
        "token": "2|abcdefghijklmnopqrstuvwxyz"
    }
}
```

## 2. Portfolio Data

### Get Full Portfolio
**GET /api/portfolio**
```json
{
    "success": true,
    "message": "Portfolio data retrieved successfully",
    "data": {
        "profile": {
            "id": 1,
            "full_name": "Jay Wyndel Bagsic",
            "title": "BSIT-3 Student Developer",
            "bio": "A BSIT-3 student passionate about learning software development...",
            "location": "Philippines",
            "address": "Purok 10, Pag-Asa, Kapalong, Davao del Norte",
            "email": "jaywyndelb0@gmail.com",
            "phone": "09518135923"
        },
        "about_me": {
            "id": 1,
            "introduction": "A BSIT-3 student passionate about learning software development...",
            "career_goal": "To become a skilled software developer...",
            "summary": "Currently exploring various technologies like Laravel..."
        },
        "skills": [
            {
                "id": 1,
                "name": "Problem Solving",
                "level": "Intermediate",
                "description": "Ability to analyze problems..."
            }
        ],
        "tech_stacks": [
            {
                "id": 1,
                "name": "Kotlin",
                "category": "programming language",
                "proficiency_level": "Beginner"
            }
        ],
        "education": [
            {
                "id": 1,
                "school_name": "North Davao College",
                "degree": "Bachelor of Science in Information Technology",
                "field_of_study": "Information Technology",
                "year_section": "BSIT-3",
                "start_date": "2023-08-01",
                "is_current": true,
                "description": "Currently in my third year..."
            }
        ],
        "experiences": [
            {
                "id": 1,
                "title": "Built simple school programming projects",
                "type": "school activity",
                "description": "Developed various small-scale applications...",
                "achievements": "Improved logic and problem-solving skills."
            }
        ],
        "projects": [
            {
                "id": 1,
                "name": "Student Task Manager App",
                "slug": "student-task-manager-app",
                "description": "A simple application to help students track their tasks...",
                "role": "Lead Developer",
                "technologies_used": "Kotlin, SQLite",
                "status": "Completed",
                "featured": true
            }
        ],
        "social_links": [
            {
                "id": 1,
                "platform": "GitHub",
                "url": "https://github.com/jaywyndel",
                "username": "jaywyndel",
                "is_active": true
            }
        ]
    }
}
```

### Get Single Skill
**GET /api/skills/1**
```json
{
    "success": true,
    "message": "Skill retrieved successfully",
    "data": {
        "id": 1,
        "name": "Problem Solving",
        "level": "Intermediate",
        "description": "Ability to analyze problems and find effective solutions."
    }
}
```

## 3. Error Responses

### Validation Error
**POST /api/register** (Invalid data)
```json
{
    "success": false,
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email field is required."
        ],
        "password": [
            "The password confirmation does not match."
        ]
    }
}
```

### Authentication Error
**GET /api/user** (No Bearer token)
```json
{
    "success": false,
    "message": "Unauthenticated."
}
```

### Resource Not Found
**GET /api/projects/999**
```json
{
    "success": false,
    "message": "Project not found"
}
```
