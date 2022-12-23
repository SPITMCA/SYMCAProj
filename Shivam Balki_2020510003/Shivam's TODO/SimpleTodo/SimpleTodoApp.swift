//
//  SimpleTodoApp.swift
//  SimpleTodo
//
//  Created by Shivam Balki on 10/09/22.
//

import SwiftUI

@main
struct SimpleTodoApp: App {
    
    let persistentContainer = CoreDataManager.shared.persistentContainer
    
    var body: some Scene {
        WindowGroup {
            ContentView().environment(\.managedObjectContext, persistentContainer.viewContext)
        }
    }
}
