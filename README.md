# Flight Booking System (Sky Asia Express) 
Technologies: Php | JavaScript | PhpMyAdmin(MySQL)

## Project Overview
Sky Asia Expressis a dynamic full-stack web application that simulates a real-world flight ticket booking system. It allows users to search for flights, book one-way or round-trip tickets, and manage passenger information. The platform also features an admin panel for managing schedules and flight details.
> **Admin Access**  
Username: admin  
Password: sae12345

---

## Key Features
(1) Advanced **flight search** with filters for:
  - Departure & arrival locations
  - Dates (one-way or round-trip)
  - Flight class (Economy / Business)
  - Passenger Numbers and Passenger Types (Adult,Child,Kid)
    
(2) **Admin interface** for:
  - Adding flight schedules
  - Viewing bookings
  - Managing flight data
    
---

## Sample Flight Data for Testing

> Since this is a demo project, the available search data is limited. Use the following values when testing the booking system:

### One-Way Tickets
| From | To | Date | Class |
|------|----|------|-------|
| Bangkok (Thailand) | Yangon (Myanmar) | 2024-Nov-11 | Economy |
| Yangon (Myanmar) | Bangkok (Thailand) | 2024-Nov-17 | Economy |
| Osaka (Japan) | Seoul (Korea) | 2024-Nov-02 | Business |
| Seoul (Korea) | Osaka (Japan) | 2024-Nov-07 | Business |
| Kuala Lumpur (Malaysia) | Surabaya (Indonesia) | 2024-Nov-08 | Economy |

### Round-Trip Tickets
| From | To | Depart Date | Return Date | Class |
|------|----|-------------|-------------|-------|
| Bangkok(Thailand) | Yangon(Myanmar) | 2024-Nov-11 | 2024-Nov-17 | Economy |
| Osaka(Japan)| Seoul(Korea) | 2024-Nov-02 | 2024-Nov-07 | Business |
| Kuala Lumpur(Malaysia) | Surabaya(Indonesia) | 2024-Nov-08 | 2024-Nov-13 | Economy |

---

## 📚 Lessons Learned
- Gained hands-on experience with PHP backend development and MySQL integration using PhpMyAdmin.
- Learned how to use PHP's echo statements effectively to display dynamic content like flight schedules.
- Understood how to pass parameters between pages as I need to carry the data that users enter to search flights to different pages.
- Developed a admin functionalities such as Add, Update, Delete using PHP.
  
---

## ❌ Mistakes Made
- Initially struggled with passing parameters across different pages, especially maintaining selected flight data.
- Did not structure PHP files in a modular way, which made the code harder to manage as the project grew.

---

## Final Thoughts
Sky Asia Express was built as a portfolio-level project to demonstrate full-stack web development skills. It simulates the workflow of actual airline booking systems while offering a smooth interface for both users and admins.

