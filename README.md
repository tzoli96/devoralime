# Hero Battle Arena API

This project simulates a battle arena where different types of heroes (Archers, Cavalry, and Swordsmen) fight against each other based on predefined rules. The project is built using PHP and Docker Compose, and it includes a web API with endpoints for generating heroes and starting battles.

## Requirements

- Docker
- Docker Compose

## Setup and Installation

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd <repository-directory>
   
2. **Build and start the Docker containers:**
   ```bash
   docker-compose up -d --build

3. **Access the application:**
   ```bash
   The application will be available at http://localhost.

## API Endpoints

1. **Random Hero Generator**
- **Endpoint:** /index.php?controller=arena&action=generate&count={number}
- **Method:** GET
- **Description:** Generates a specified number of heroes and returns an arena ID.
- **Parameters:** count (optional): The number of heroes to generate (default is 10).
- **Response:**    
- ```bash
  {
  "arenaId": "unique-arena-id" 
  }

2. **Start Battle**
- **Endpoint:** /index.php?controller=battle&action=start&arenaId={arenaId}
- **Method:** GET
- **Description:**Starts the battle in the specified arena and returns the battle history.
- **Parameters:** arenaId: The ID of the arena.
- **Response:**
- ```bash
  {
  "history": [
    {
      "attacker": "hero-id-1",
      "defender": "hero-id-2",
      "result": "opponent_dead",
      "attacker_health": 50,
      "defender_health": 0
    },
    ...
  ]
}